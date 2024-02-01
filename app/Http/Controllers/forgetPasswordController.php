<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\resetPassword as RP;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class forgetPasswordController extends Controller
{
    public function forgetPasswordForm(){
        return view('frontend.auths.forgetPassword');
    }

    public function forgetPassword(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users'
        ]);

        $token = Str::random(64);

        RP::create([
            'email' => $request->email,
            'token' => $token,
        ]);

        Mail::send('frontend.auths.resetPassword',['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });
        return back()->with('success','We have send you the password reset link! Check Now!');
    }

    public function resetPasswordForm($token){
        return view('frontend.auths.resetPassword',compact($token));
    }

    public function resetPassword(Request $request){

    }
}
