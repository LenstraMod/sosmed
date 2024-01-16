<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function navigation(){
        $menuActive = 'home';
        $navigation = [
            [
                'name' => 'Home',
                'url' => route('home'),
                'icon' => 'fa-solid fa-house',
            ],
            [
                'name' => 'Profile',
                'url' => route('profile'),
            ],
        ];

        return view('frontend.home', compact('menuActive','navigation'));
    }
}
