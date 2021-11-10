<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\Orders;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Ticket;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
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
                }
            }
        }

        $user = $order->user;
        return response()->json([
            'status' => 'order exists',
            'order' => $order,
            'user' => $user,
            'tickets_club_count' => $tickets_club_count,
            'count_tickets' => $count_tickets,
        ]);
    }

    public function show2(Order $order)
    {
//        dd($order);
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
                }
            }
        }

        $user = $order->user;
        $orders = ([
            'status' => 'order exists',
            'order' => $order,
            'user' => $user,
            'tickets_club_count' => $tickets_club_count,
            'count_tickets' => $count_tickets,
        ]);
        return view('admin.orders.show', compact('orders'));
    }

    public function show3(Order $order)
    {
//        dd($order);
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
                }
            }
        }

        $user = $order->user;
        $orders = ([
            'status' => 'order exists',
            'order' => $order,
            'user' => $user,
            'tickets_club_count' => $tickets_club_count,
            'count_tickets' => $count_tickets,
        ]);
        return $orders;
    }

    public function edit(Order $order){

    }

    public function addTicketToOrder(Request $request)
    {
//        dd($request);
        $this->validate($request, [
            'amount' => 'required|numeric',
            'club_id' => 'required|numeric',
        ]);

//        $this->validate($request, [
//            'price' => 'required|numeric',
//            'amount' => 'required|numeric',
//            'club_id' => 'required|numeric',
//        ]);
//        dd($request);
        $tickets = [];
        $order = Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')->first();
        $club = Club::where('id',$request->club_id)->first();

        $price = round($club->price - ($club->price * ($club->discount/100)),2);

        $request->request->add(['price' => $price]);

        if (blank($order)){
            $order = new Order;
        }elseif ($order->status != 'completed'){
            $order = Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')->first();
        }else{
            $order = new Order;
        }
//        $order = new Order;
        $orders = Orders::where('user_id', Auth::id())->first() ?? new Orders;
        $orders = new Orders;

//        dd($order->tickets->where('club_id'));

        if($order->tickets->where('club_id', intval($request->club_id))->count() + intval($request->amount) > 20)
        {
            return response()->json([
                'status' => 'too many tickets',
                'amount' => $request->amount
            ]);
        }

        for($i=0; $i<intval($request->amount); ++$i)
        {
            $ticket = new Ticket;
            $ticket->token = uniqid();
            $ticket->fill($request->all());

            $ticket->save();
            $tickets[] = $ticket->id;
        }

        if(is_null($order->serial_code))
        {
            $orders->serial_code  = $order->serial_code = uniqid();
        }
        $orders->serial_code = uniqid();
        $order->user_id = Auth::id();


//        $orders->save();
        $order->save();



        $order->tickets()->attach($tickets);

//        dd($order);

        return response()->json([
            'status' => 'tickets has been succeessfuly added'
        ]);
    }

    public function getCurrentOrderBusket()
    {
        $order = User::find(Auth::id())->order->last();
//        dd($order);
        if($order->status !='completed'){
            return $this->show3($order);
        } else {
            return 0;
        }
    }

    public function getCurrentOrder(Request $request)
    {
        $order = User::find(Auth::id())->order->last();
//        dd($order);
        if($order->status !='completed'){
            return $this->show($order);
        } else {
            return response()->json([
                'status' => 'order doesn\'t exist'
            ]);
        }
    }

    public function removeClubFromCart(int $club_id)
    {
        $order = Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')->first();
        $tickets_id = $order->tickets->where('club_id', $club_id)->pluck('id')->toArray();
        $order->tickets()->detach($tickets_id);
//          $order->tickets()->delete($tickets_id);

        return response()->json([
            'status' => 'club with tickets have been deleted successfuly'
        ]);
    }

    public function changeAmountTickets(Request $request)
    {
        $this->validate($request, [
            'price' => 'required|numeric',
            'club_id' => 'required|numeric',
            'decrease_flag' => 'required'
        ]);

        if($request->decrease_flag === 'on'){
            $order = Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')->first();

            $tickets_id = $order
                ->tickets
                ->where('club_id', intval($request->club_id))
                ->pluck('id')
                ->take(intval($request->amount))
                ->toArray();
            $order->tickets()->detach($tickets_id);

            return response()->json([
                'status' => 'tickets have been deleted'
            ]);
        }
        return $this->addTicketToOrder($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders.index')->with('status', 'Вы успешно удалили заказ');
    }
}
