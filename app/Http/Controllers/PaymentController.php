<?php

namespace App\Http\Controllers;

use App\Mail\AdminTicketMailer;
use App\Mail\ClubAdminMailer;
use App\Mail\PromosMailer;
use App\Mail\UserTicketMailer;
use App\Models\AdminMail;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
//use App\Http\Controllers\Auth;

use Auth;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\ExpressCheckout;
use App\Models\Promo;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    private $products;
    public function makePayment(Request $request)
    {

        $this->validate($request, [
            'payment' => 'required|string',
            'items' => 'required|array',
            'items.*' => 'required|array',
            'items.*.*' => 'required|string'
        ]);

        $order = Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')->first();
        $price = 0;
        foreach ($order->tickets as $item){
            $price += $item->price;
        }
        $request->merge(["total_price_order"=>$price]);
//        dd($request);

        $this->payViaPayPal($request);
        $paypalModule = new ExpressCheckout;
//        dd($request);
        $result = $paypalModule->setExpressCheckout($this->products);
        $result = $paypalModule->setExpressCheckout($this->products, true);
//        dd($result);
        return response()->json(['link' => $result['paypal_link']]);
    }

    public function checkDiscount(Request $request)
    {
        $this->validate($request, [
            'discountCode' => 'required|string'
        ]);

        $promo = Promo::where('discountCode', $request->discountCode)->first();
        if($promo)
        {
            return response()->json([
                'status' => 'promo found',
                'discountPercent' => $promo->discountPercent
            ]);
        }
        return response()->json([
            'status' => 'promo not found'
        ]);
    }

    private function payViaPayPal(Request $request)
    {
        $this->changeUserStatus($request);
        $this->products = $this->getProductsForPaypal($request);
    }

    private function changeUserStatus($request)
    {
        $user = Auth::user();

        $user->user_profile->buyed_ticket_current_level =   ($user->user_profile->buyed_ticket_current_level  + intval($request->amount)) % 10;
//        $user->user_profile->buyed_ticket_current_level += intval($request->amount);
          $user->user_profile->level += intval($request->amount) / 10;
//        $user->user_profile->level += intval($request->amount);
          $user->user_profile->buy_count_tickets += intval($request->amount);


        if($user->user_profile->level >= 50)
        {
            $user->user_profile->level = 50;
            $user->user_profile->card_status = 'diamond club card';
        }
        else if($user->user_profile->level >= 20)
        {
            $user->user_profile->card_status = 'gold club card';
        }
        else if($user->user_profile->level >= 5)
        {
            $user->user_profile->card_status = 'silver club card';
        }
//        $user->user_profile->buyed_ticket_current_level = 40;
//        $user->user_profile->level = 10;
        $user->user_profile->save();
    }

    private function changeUserStatusPayment($request)
    {
        $user = Auth::user();

//        dd($request);

        $profile_level = intval(($user->user_profile->buyed_ticket_current_level + $request['count_tickets']) / 10);
        $user->user_profile->level += $profile_level;
        $user->user_profile->buyed_ticket_current_level = ($user->user_profile->buyed_ticket_current_level + $request['count_tickets']) % 10;
        $user->user_profile->buy_count_tickets += intval($request['count_tickets']);
//        $user->user_profile->buyed_ticket_current_level += intval($request->amount);
//        $user->user_profile->level += intval($request->amount);
//        var_dump($profile_level_next);
//        var_dump($profile_level);
//        dd($sraka);

        for ( $i = 0; $i < $profile_level; $i++){

            $promo = new Promo;

            $promo->discountCode = uniqid();
            $promo->discountPercent = 0;
            $promo->title = 'Free tickets';
            $promo->status = 1;
            $promo->user_id = Auth::id();
            $promo->save();

            $promos[] = $promo;
        }
        if (isset($promos)){
            Mail::to($user['email'])->send(new PromosMailer($promos));
        }

        if($user->user_profile->level >= 50)
        {
            $user->user_profile->level = 50;
            $user->user_profile->card_status = 'diamond club card';
        }
        else if($user->user_profile->level >= 20)
        {
            $user->user_profile->card_status = 'gold club card';
        }
        else if($user->user_profile->level >= 5)
        {
            $user->user_profile->card_status = 'silver club card';
        }
        $user->user_profile->save();

        if(isset($promos)){
            return $promos;
        }else{
            return false;
        }
//        var_dump($profile_level_next);
//        var_dump($profile_level);
//        var_dump($profile_level1);
//        $sraka = $profile_level_next - $profile_level;
//        dd($profile_level1);
    }

    public function paymentCancel()
    {
        return redirect()->route('index')->with('status', 'Payment was cancelled');
    }

    public function paymentSuccess(Request $request)
    {
        $paypalModule = new ExpressCheckout;
        $token = $request->token;
        $payerId = $request->PayerID;
        $response = $paypalModule->getExpressCheckoutDetails($request->token);
        $response = $paypalModule->doExpressCheckoutPayment(session()->get('products'), $token, $payerId);
        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            $adminMail = AdminMail::first();
            $order = Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')->first();
            $order->status = 'completed';
            $order->save();

            $tickets = $order->tickets;
            $count_tickets = $order->tickets->count();

            $tickets_club_count = [];
            foreach($order->tickets as $ticket)
            {
                $tickets_club_count[$ticket->club->title] =  [0, null];
            }
            foreach($tickets_club_count as $key=>$value)
            {
                for($i=0; $i<count($tickets); ++$i)
                {
                    if($key === $tickets[$i]->club->title)
                    {
                        $tickets_club_count[$key][0] += 1;
                        $tickets_club_count[$key][1] = $tickets[$i]->price;
                        $tickets_club_count[$key][2] = $tickets[$i]->club_id;
                        $tickets_club_count[$key][3] = $tickets[$i]->club->email;
                        $tickets_club_count[$key][4] = $order->user;
                        $tickets_club_count[$key][5][] = $tickets[$i]->token;
                    }
                }
            }


            $user = $order->user;
//            dd($tickets_club_count);
            $orders = ([
                'status' => 'order exists',
                'order' => $order,
                'user' => $user,
                'tickets_club_count' => $tickets_club_count,
                'count_tickets' => $count_tickets,
                'promo'=>'',
            ]);


            $user = Auth::user();

            $ebala = $this->changeUserStatusPayment($orders);

            if ($ebala != false){
                $orders['promo'] = $ebala;
            }

            Mail::to($adminMail->email)->send(new AdminTicketMailer($orders));
            Mail::to($user->email)->send(new UserTicketMailer($orders));

            for ($i = 0; $i <= count($tickets_club_count); $i++ ){
//                    dd($tickets_club_count);
                $club_offer = array_shift($tickets_club_count);
//                print_r($club_offer[3]);
//                echo '<br>';
                Mail::to($club_offer[3])->send(new ClubAdminMailer($club_offer));

            }
            return redirect()->route('index')->with('status', 'Payment was successfuly');
        }

        return redirect()->route('index')->with('status', 'Error was occurred');
    }

    private function getProductsForPayPal($request)
    {
//        dd($request);
        $product = [];
        $product['items'] = [];
        foreach($request->items as $item){
            $product['items'][] =
            [
                'name' => $item['name'],
                'price' => $item['price'],
                'desc'  => $item['description'],
                'qty' => $item['quantity']
            ];
        }

        if(isset($request->discount) && !is_null($request->discount)){
//            $discount = (floatval($request->sum) / (floatval($request->discount) / 100)) - floatval($request->sum);

            $discount_percent = Promo::where('discountCode',$request->discount)->first();

            $discount_total_price =  floatval($request->total_price_order) - ((floatval($request->total_price_order) * floatval($discount_percent->discountPercent)) / 100);
            $discount_total_price = round($discount_total_price, 2);

            $discount =  (floatval($request->total_price_order) * floatval($discount_percent->discountPercent)) / 100;
            $discount = round($discount, 2);



            $request->total_price_order = $discount_total_price;

            $product['items'][] = [
                'name' => 'Discount',
                'price' => "-{$discount}",
                'desc' => 'Discount by promo',
                'qty' => 1
            ];
        }

        $product['invoice_id'] = Str::uuid();
        $product['invoice_description'] = "Order #{$product['invoice_id']} Bill";
        $product['return_url'] = route('success.payment');
        $product['cancel_url'] = route('cancel.payment');
        $product['total'] = $request->total_price_order;
//        dd($product);
        session(['products' => $product]);
        return $product;
    }
}
