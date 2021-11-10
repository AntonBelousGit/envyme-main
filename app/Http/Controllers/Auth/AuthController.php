<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\AuthenticateRequest;
use App\Mail\ActivateAccount;
use App\Models\Social;
use App\Models\User;
use App\Service\Users\Handlers\UserHandler;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class AuthController extends Controller
{
    public function register()
    {
        $socials = Social::all()->sortBy('id');
        return view('auth.register',compact('socials'));
    }

    public function storeUser(UserRequest $request, UserHandler $userHandler)
    {
        $request->validated();

        $huita = User::where('nickname',$request->nickname)->first();

//        dd($huita);

        if (!is_null($huita)){
            return redirect()->route('register')->with('status', __('auth.nickname already exists'));
        }
//        dd($huita);
        $user = $userHandler->createUser($request);

        Mail::to($user['email'])->send(new ActivateAccount($user));

//        Auth::login($user);
//        return redirect()->route('my_account', Auth::id())->with('status', 'You have registered successfuly');
          return redirect()->route('login')->with('status', __('auth.check email'));
    }

    public function login()
    {   $socials = Social::all()->sortBy('id');
        return view('auth.login',compact('socials'));
    }
    public function activation($userId, $token){

        $user = User::findOrFail($userId);

        if (is_null($user->remember_token)){
            if (md5($user->email) == $token){
                $mytime = now();
                $user->email_verified_at = $mytime->toDateTimeString();
                $user->save();

                Auth::login($user);
            }else{
                return redirect()->route('login')->with('status',__('auth.wrong token'));
            }

        }else{
            return redirect()->route('login')->with('status', __('auth.user activated'));
        }
        return redirect('/');
    }


    public function authenticate(AuthenticateRequest $request)
    {
        $request->validated();
        $user = User::where('nickname',$request->nickname)->first();
        $credentials = $request->only('nickname', 'password');

//        dd($user);
        if ($user == null){
            return redirect()->route('login')->with('status',__('auth.no such user'));
        }
        elseif (!Auth::attempt($credentials)){
            return redirect()->route('login')->with('status',__('auth.wrong password'));
        }
        elseif (is_null($user->email_verified_at)){
            Auth::logout();
            return redirect()->route('login')->with('status',__('auth.check email'));
        }
        elseif( !is_null($user->email_verified_at) && Auth::attempt($credentials))
        {
//            dd(!is_null($user->email_verified_at));
//            return redirect()->intended('admin');
//            dd(url()->previous());
//            return Redirect::to(URL::previous());
//            return redirect()->intended(url()->previous());
            if (!empty(session('previous-url'))){
                $url = session('previous-url');
                $request->session()->forget('previous-url');
                return redirect($url);
            }else{
                return redirect()->intended('admin');
            }
//              return redirect(session('previous-url'));
        }
//        dd($user);
        return redirect()->route('login')->with('status','error');
    }

    public function logout() {
        Auth::logout();

        return redirect('login');
    }

    public function isAuthenticated()
    {
        if (Auth::check()){
            $id = Auth::id();
            $currentuser = User::find($id);

            if ( is_null($currentuser->email_verified_at)){
                return response()->json([
                    'isAuthenticated' => false
                ]);
            }
            return response()->json([
                'isAuthenticated' => true
            ]);

        }
        return response()->json([
            'isAuthenticated' => false
        ]);
    }
}
