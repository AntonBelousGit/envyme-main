<?php

namespace App\Http\Controllers;

use App\Mail\PasswordResetsMailer;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\PasswordResets;

class ForgotPasswordController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showForgetPasswordForm()
    {
        $socials = Social::all()->sortBy('id');
        return view('auth.forget',compact('socials'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        $password_resets = new PasswordResets;
        $password_resets->email = $request->email;
        $password_resets->token = $token;
        $password_resets->created_at = now();
        $password_resets->save();

        $user = User::where('email',$request->email)->first();
        $password_resets->nickname = $user->nickname;

        Mail::to($request->email)->send(new PasswordResetsMailer($password_resets));

        return back()->with('status', 'We have e-mailed your password reset link!');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showResetPasswordForm($token) {
        $socials = Social::all()->sortBy('id');
        return view('auth.forgetPasswordLink',compact('socials','token'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = PasswordResets::where('email',$request->email)->where('token',$request->tokenservice)->first();
//        dd($updatePassword);
        if(!$updatePassword){
            return back()->withInput()->with('status', 'Invalid token!');
        }

        User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

//        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        $updatePassword->delete();

        return redirect()->route('login')->with('status', 'Your password has been changed!');
    }
}
