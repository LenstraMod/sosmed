<?php

namespace App\Http\Controllers\Auths;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    public function ShowLoginForm(){
        return view('frontend.auths.login');
    }

    public function login(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
            ])){

            $request->session()->regenerate();
            return redirect('/')->with('success', 'Login Success');
        }

        $user = User::where('email', $request->email)->first();

        if(!$user){
            return back()->with('error', 'Email not found');
        }

        if(!Hash::check($request->password, $user->password)){
            return back()->with('PasswordErr', 'Password not match');
        }

        return back()->with('error','Login Failed');

    }
}
