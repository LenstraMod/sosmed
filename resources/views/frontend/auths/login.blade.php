@extends('layouts.app')

@section('content')

@php

    $patternName = "pattern1.png";
    $iconName = "Social Icons.svg";
    $logoName = "getOver-welcome.png";

@endphp



<div class="flex items-center justify-center h-screen" style="background-image: url('{{ asset('assets/patterns/' .  $patternName ) }}')">
    <div class="fixed top-0 left-0 mx-10 my-6 hidden md:block">
        <img src="{{ asset('assets/images/' .  $logoName ) }}" alt="">
    </div>
<div class="w-full max-w-sm">
  <form class="bg-[#1E1E1E] shadow-md rounded-lg px-8 pt-12 pb-12 mb-4" action="{{ route('loginOnValidate') }}" method="POST">
    @csrf
    <div class="head flex flex-col items-center mb-5">
        <div class="title">
            <p class="text-white font-poppins font-bold text-[28px]">Log In to Your Account!</p>
        </div>
        <div class="sub">
            <p class="text-white font-poppins text-[12px] " style="opacity: 0.55;">Let's join back to the community</p>
        </div>
    </div>
    <div class="mb-4">
      <input
      class="appearance-none bg-transparent w-full py-2 px-3 text-white mb-3 leading-tight border-b border-0 border-white focus:outline-none focus:border-0"
      id="email"
      name="email"
      value="{{ old('email') }}"
      type="email"
      placeholder="Email"
    >
    @if(session('error'))
    <span class="text-red-500">{{ session('error') }}</span
    @endif
    @error('email')
        <span class="text-red-500">{{ $message }}</span>
    @enderror
    </div>
    <div class="mb-6">
        <input
        class="appearance-none bg-transparent w-full py-2 px-3 text-white mb-3 leading-tight border-b border-0 border-white focus:outline-none focus:border-0"
        id="password"
        name="password"
        value="{{ old('password') }}"
        type="password"
        placeholder="Password"
      >
      @if(session('PasswordErr'))
        <span class="text-red-500">{{ session('PasswordErr') }}</span>
      @endif
      @error('password')
      <span class="text-red-500">{{ $message }}</span>
     @enderror
    </div>
    <div class="flex justify-center">
      <button
        class="bg-blue-500 hover:bg-blue-700 w-full text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
        type="submit"
      >
        Sign In
      </button>
    </div>
    <div class="flex items-center justify-center font-bold mt-5">
        <h3 class="text-white">OR</h3>
    </div>
    <div class="flex items-center justify-center mt-5">
        <button
        class="bg-white hover:bg-gray-100 text-black w-full font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline flex justify-center gap-2"
        type="button"
      >
      <img src="{{ asset('assets/icons/' .  $iconName ) }}" alt=""> Login with Google
      </button>
    </div>
    <div class="register mt-2 flex justify-center">
        <p class="text-white font-poppins text-[12px]">Don't have any account? <a href="{{ route('register') }}" class="text-blue-500">Register</a></p>
    </div>

  </form>
</div>
</div>

@endsection
