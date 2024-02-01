@extends('layouts.app')

@section('title','Edit Post')

<style>
    body{
        background-color: #0D1117;
    }
</style>

@section('content')

<div class="edit flex justify-center text-white">
    <div class="card bg-[#272C3E] rounded-lg p-5 shadow-lg mt-5">
        <div class="flex justify-between items-center">
         <div class="card-head flex gap-3 items-center mb-5">
             <div class="userProfile">
                 @if(filter_var($post->user->photo , FILTER_VALIDATE_URL))
                     <img src="{{ $post->user->photo }}" class="w-[25px] rounded-full" alt=" ">
                 @else
                     <img src="{{ asset('assets/images/user-images/' . $post->user->photo) }}" class="w-[50px] rounded-full" alt="">
                 @endif
                 </div>
             <div class="username">{{ $post->user->username }}</div>
             <div class="line">-</div>
             <div class="usertag text-[#869099]">{{$post->user->usertag }}</div>
         </div>

        </div>
        <form action="{{ route('postUpdate',$post->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="card-image mb-3 flex justify-center">
                <img src="{{ asset('assets/images/post-images/' . $post->image) }}" class="rounded-lg p-5" name="nowImage" alt="">
            </div>
            <div class="image-edit">
               <label class="block mb-2 text-sm font-medium text-white" for="file_input">Upload Image</label>
               <input name="image" class="block w-full text-sm border rounded-lg cursor-pointer text-gray-400 focus:outline-none bg-gray-700 border-gray-600 placeholder-gray-400" id="file_input" type="file">
            </div>
            <div class="card-content mt-5">
                <div class="title mb-3">
                    <input type="text" class="bg-transparent border-0 text-white font-poppins font-semibold text-xl w-full" value="{{ $post->title }}" name="title">
                </div>
                <div class="sub">
                   <input type="text" class="bg-transparent border-0 text-white font-poppins w-full" value="{{ $post->content }}" name="content">
                </div>
            </div>
            <button class="bg-blue-700 rounded-lg p-3 mt-5">Save</button>
        </form>
     </div>
</div>
@endsection
