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
   @if(session("success"))
        <div class="alert w-[120px] h-[120px] bg-green-500">
        <p class="text-white font-poppins">{{ session("success") }}</p>
        </div>
   @endif
  <form class="bg-[#1E1E1E] shadow-md rounded-lg px-8 pt-12 pb-12 mb-4" action="{{ route('forgetPassword') }}" method="POST">
    @csrf
    <div class="head flex flex-col items-center mb-5">
        <div class="title">
            <p class="text-white font-poppins font-bold text-[28px]">Forget Your Password?</p>
        </div>
        <div class="sub">
            <p class="text-white font-poppins text-[12px] " style="opacity: 0.55;">we'll send you the reset link!</p>
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
    <div class="flex justify-center">
      <button
        class="bg-blue-500 hover:bg-blue-700 w-full text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
        type="submit"
      >
        Reset Password
      </button>
    </div>

  </form>
</div>
</div>

@endsection
