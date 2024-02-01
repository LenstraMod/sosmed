<?php

namespace App\Http\Controllers\Auths;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class logoutController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        return redirect(route('login'));
    }
}
