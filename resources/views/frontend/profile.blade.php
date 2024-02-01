@extends('layouts.app')

@section('title','Profile')

@section('content')
<style>
    body{
        background-color: #0D1117;
    }
    .main::-webkit-scrollbar{
        display: none;
    }
</style>

<div class="home">
    <div class="wrapper">
        <div class="in-home grid grid-cols-1 sm:grid-cols-12 place-content-center overflow-x-hidden">
            <div class="hidden sm:block col-span-2">
                <div class="navbar flex flex-col items-end mt-12">
                    @include('frontend.components.nav')
                </div>
            </div>
           <div class="hidden sm:block col-span-1">
                <div class="line flex justify-center">
                    <div class="line h-screen fixed w-[0.55px] bg-white"></div>
                </div>
            </div>
            <div class="main col-span-9  flex flex-col h-screen overflow-x-hidden overflow-y-auto p-5 font-poppins">
                <div class="scroll-view text-white mt-12 scroll-smooth">

                    <div class="header-profile flex items-center gap-12 mx-12">
                        <div class="profile-image flex flex-col justify-center">
                            @if(filter_var($user->photo , FILTER_VALIDATE_URL))
                            <img src="{{ $user->photo }}" class="rounded-full w-[200px] mx-5" alt="">
                            @else
                            <img src="{{ asset('assets/images/user-images/' .  $user->photo ) }}" class="rounded-full w-[200px] mx-5" alt="">
                            @endif
                            <button class="mt-9 border-2 border-blue-700 hover:bg-blue-700 duration-300 py-3 px-5 rounded-lg">Set Up Profile</button>
                        </div>
                        <div class="user-detail">
                            <div class="username">
                                <p class="text-[2rem] font-semibold">{{ $user->username }}</p>
                            </div>
                            <div class="usertag">
                                <p class="text-[#869099]">{{ $user->usertag }}</p>
                            </div>
                            <div class="joined">
                                <p class="text-[#869099]">Joined {{ $user->created_at }}</p>
                            </div>
                        </div>

                </div>
                <div class="content mt-12 p-12 w-fit">
                    <div class="post">
                        <div class="post-header">
                            <p class="text-xl font-semibold">Post</p>
                        </div>
                        <div class="post-content">
                            @if($posts -> isEmpty())
                                <p class="text-white font-bold font-poppins text-md mt-5">No Post</p>
                            @else
                                @foreach($posts as $post)
                                @include('frontend.components.postCard')
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endSection
<!-- Pada file view atau layout Anda -->


