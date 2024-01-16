<style>
    .active {
        background-color: #272C3E;
        padding: 10px;
        width: 194px;
        color: white;
        border: 1px;
        border-radius: 20px;
        text-align: center
    }
    li{
        margin-bottom: 50px;
    }
    li a{
        font-size: 25px
    }
    li a:hover{
        cursor: pointer;
        color: rgb(196, 192, 192);
        transition: ease-in-out 0.5s;

    }
</style>

@php

    $logoName = "GetoverLogo-XL-Size.png";

@endphp

<div class="navbar">
    <div class="logo mb-7">
     <img src="{{ asset('assets/images/' .  $logoName ) }}" onclick="window.location='{{ route('home') }}'" alt="Logo" class="w-[200px]">
    </div>
    <div class="navigation">
        <div class="text-white">
            <ul class="font-poppins">
               <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                    <a href="{{ route('home') }}"> <i class="fa-solid fa-house"></i> Home</a>
                </li>
                <li class="{{ request()->routeIs('profile') ? 'active' : '' }}">
                    <a href="{{ route('profile') }}"> <i class="fa-solid fa-user"></i> Profile</a>
                </li>
                <li class="{{ request()->routeIs('more') ? 'active' : '' }}">
                    <a href="#"> <i class="fa-solid fa-ellipsis-vertical"></i> More</a>
                </li>
            </ul>
        </div>
    </div>
 </div>
 <a class="text-blue-400" href="{{ route('logout') }}">log out</a>
