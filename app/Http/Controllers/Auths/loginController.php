<?php

namespace App\Http\Controllers\Auths;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

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
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {

           $user = Socialite::driver('google')->user();

           $findUser = User::where('google_id', $user->id)->first();

           if(!$findUser){
            $saveUser = User::updateOrCreate(
                [
                    'google_id' => $user->getId(),
                ],
                [
                    'username' => $user->getName(),
                    'usertag' => '@' . $user->getName(),
                    'email' => $user->getEmail(),
                    'photo' => $user->getAvatar(),
                    'password' => Hash::make($user->getName() .  '@' . $user->getId()),
                ],
            );
            $saveUser = User::where('email', $user->getEmail())->first();
            Auth::loginUsingId($saveUser);
           }
           else{
                Auth::login($findUser);
           }



           return redirect()->route('home');

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
