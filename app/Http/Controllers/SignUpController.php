<?php

namespace App\Http\Controllers;
use App\Models\Subscribers;
use App\Http\Requests\SubscribeRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class SignUpController extends Controller
{
    public function signup(){
        return view('signup');
    }

//    public function subscribe(SubscribeRequest $request){
////        dd($request);
//        $subscribers = new Subscribers([
//            'email' => $request->email
//        ]);
//        $subscribers->save();
//        return redirect()->route('index')->with('status', 'Вы успешно подписались на рассылку');
//    }

    public function subscribe(SubscribeRequest $request){
        if (Subscribers::where('email', $request->email)->exists()) {
            return redirect()->route('index')->with('status', __('page.sub already exists'));
        }
        else
        {
            $subscribers = new Subscribers([
                'email' => $request->email
            ]);
            $subscribers->save();
        }

        return redirect()->route('index')->with('status', __('page.sub recent'));
    }
}
