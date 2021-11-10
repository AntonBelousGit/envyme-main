<?php

namespace App\Http\Controllers;
use App\Mail\PromosMailer;
use App\Models\Club;
use App\Models\Filter;
use App\Models\Order;
use App\Models\PasswordResets;
use App\Models\Promo;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Imagick;
use SimpleSoftwareIO\QrCode\Generator;
use Auth;

use Illuminate\Http\Request;

class QrcodeController extends Controller
{
   public function index(){
//       $qrcode = Filter::where('type','country')->with('cities.clubs','cities.events')->get();
//       $qrcode = Filter::where('type','country')->with(['cities.events'=>function ($query) { $query->where('type','');} ])->get();
//       $qrcode = Filter::where('type','country')->with('cities.events')->where('type','activity')->count();
     $club = Filter::where('type','country')->with('cities.clubs')->get();
     $country = Filter::where('type','country')->count();
     $country_name = Filter::where('type','country')->get();

//     $count_club_per_country = [];
//
//         for($i = 0; $i < $country; $i++){
//             $count = 0;
//                 for ($j = 0; $j < count($club[$i]['cities']); $j++){
//                     $count += count($club[$i]['cities'][$j]['clubs']);
//                 }
//                 $count_club_per_country[$country_name[$i]['title']] = $count;
//         }
//
//     $event = Filter::where('type','country')->with('cities.events')->get();
//
//     $count_event_package_per_country = [];
//
//     for($i = 0; $i < $country; $i++){
//       $count = 0;
//       for ($j = 0; $j < count($event[$i]['cities']); $j++){
//           for ($z = 0; $z < count($event[$i]['cities'][$j]['events']); $z++){
//               if ($event[$i]['cities'][$j]['events'][$z]['type'] == 'package') {
//                    $count++;
//               }
//           }
//       }
//       $count_event_package_per_country[$country_name[$i]['title']] = $count;
//     }
//
//     $count_event_activity_per_country = [];
//
//     for($i = 0; $i < $country; $i++){
//       $count = 0;
//       for ($j = 0; $j < count($event[$i]['cities']); $j++){
//           for ($z = 0; $z < count($event[$i]['cities'][$j]['events']); $z++){
//               if ($event[$i]['cities'][$j]['events'][$z]['type'] == 'activity') {
//                   $count++;
//               }
//           }
//       }
//       $count_event_activity_per_country[$country_name[$i]['title']] = $count;
//     }






//       $event_count = count($qrcode[0]['cities'][0]['events'])->where('type','activity');
//       $users = App\User::with(['posts' => function ($query) { $query->where('title', 'like', '%first%');}])

//       dd($qrcode);
//       dd($qrcode[0]['cities'][0]);
//       $qrcode = User::all();
//       $qrcode =   $qrcode->cities();
//       $user = Auth::user();
//
//        $profile_level = $user->user_profile->level;
//        $profile_current_level = $user->user_profile->buyed_ticket_current_level;
////        $profile_level_next = $user->user_profile->buyed_ticket_current_level += 25 % 10;
//        $profile_level_next= $user->user_profile->level += intval(100) / 10;
//
//        print_r($profile_current_level);
//        print_r($profile_level_next);

//       $token = Str::random(64);
//
//       $password_resets = new PasswordResets;
//       $password_resets->email = 'antondfkgdlksd@gmail.com';
//       $password_resets->token = $token;
//       $password_resets->created_at = now();
//       $password_resets->save();


//        $sraka = intval($profile_level_next - $profile_level );
//       for ( $i = 1; $i <= $sraka; $i++){
//
//           $promo = new Promo;
//
//           $promo->discountCode = uniqid();
//           $promo->discountPercent = 0;
//           $promo->title = 'Free tickets';
//           $promo->status = 1;
//           $promo->user_id = Auth::id();
//           $promo->save();
//
//           $promos[] = $promo;
//       }
//
//       if (isset($promos)){
//           Mail::to($user['email'])->send(new PromosMailer($promos));
//
//       }

//        dd($promos);
//       $token = md5(uniqid(""));
//       $data = $qrcode->size(200)->generate($token);
       $order = Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')->first();
//       dd($order->tickets);

       $price = 0;
       foreach ($order->tickets as $item){
            $price += $item->price;
       }
       echo $price;
       $discount = ($price / 100) * 50.05 ;
       dd($discount);
       //         $club =  Club::where('title', '')->get();
//         $city = 'ro';
//         $club =  Club::where('title', 'like','%'.$city.'%')->get();;
         //
//

//            function pizda ($city){
//                if(!is_null($city)) {
////                    $clubs = Club::whereHas('filters', function($q) use($city){
////                        return $q->where('title', $city);
////                    });
//                    $clubs =  Club::where('title', 'like','%'.$city.'%')->get();
//                 }
//                return $clubs->paginate(8);
//            }
//
//       $club  = pizda('Dnepr');
//       $tickets = $order->tickets;
//       $count_tickets = $order->tickets->count();
//       $tickets_club_count = [];
//       foreach($order->tickets as $ticket)
//       {
//           $tickets_club_count[$ticket->club->title] =  [0, null];
//       }
//
//
//       foreach($tickets_club_count as $key=>$value)
//       {
//           for($i=0; $i<count($tickets); ++$i)
//           {
//               if($key === $tickets[$i]->club->title)
//               {
//                   $tickets_club_count[$key][0] += 1;
//                   $tickets_club_count[$key][1] = $tickets[$i]->price;
//                   $tickets_club_count[$key][2] = $tickets[$i]->club_id;
//               }
//           }
//       }

//       $user = $order->user;
//       $orders = ([
//           'status' => 'order exists',
//           'order' => $order,
//           'user' => $user,
//           'tickets_club_count' => $tickets_club_count,
//           'count_tickets' => $count_tickets,
//       ]);
//       $user = Auth::user();
////       $order = Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')->first();
////       $orders = User::find(Auth::id())->order->last();
//       $order = User::find(\Illuminate\Support\Facades\Auth::id())->order->last();
////      dd($orders);
//       var_dump (Imagick::getVersion ());
//       return view ('qrcode.index',compact(['profile_level','user','profile_level_next','profile_current_level']));
       return view ('qrcode.index',compact(['qrcode']));
   }

   public function show(){

   }
}
