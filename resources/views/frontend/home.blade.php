@extends('layouts.app')
@section('title', 'Lensmedia | Home')
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
            <div class="main col-span-6  flex flex-col h-screen overflow-x-hidden overflow-y-auto p-5 font-poppins">
                <div class="search mt-12">
                    <input type="search" placeholder="Search" class="text-white w-full rounded-lg bg-[#1E1E1E] border-0 px-4 py-2">
                </div>
                <div class="scroll-view text-white mt-12 scroll-smooth">
                   @foreach($post as $post)
                   @include('frontend.components.postCard')
                   @endforeach
                </div>
            </div>
            <div class="hidden sm:block col-span-1">
                <div class="line flex justify-center">
                    <div class="line h-screen w-[0.55px] fixed bg-white"></div>
                </div>
            </div>
            <div class="hidden sm:block col-span-2">
                <div class="rightbar flex flex-col pr-5 font-poppins">
                    <div class="user-profile text-white flex items-center mt-5 mb-12">
                        <div class="profile-image">
                            <img src="https://i.pinimg.com/originals/ae/67/fe/ae67fe590aa67995dbc94c85af37d6bc.jpg" class="rounded-full w-[75px]" alt="">
                        </div>
                        <div class="user-detail">
                            <div class="username">
                                <p class=" font-semibold">NanamiJustGoMalaysia</p>
                            </div>
                            <div class="usertag">
                                <p class="text-[#869099]">@nanamirevived</p>
                            </div>
                        </div>
                        <div class="setting mx-5">
                            <i class="fa-solid fa-ellipsis-vertical text-xl"></i>
                        </div>
                    </div>
                    <div class="post">
                        <button class="w-full text-white bg-blue-700 p-2 mt-3 rounded-lg font-semibold hover:bg-blue-800 transition duration-150 ease-out">Post</button>
                    </div>
                    <div class="stories mt-12">
                        <div class="story-card  p-3 rounded-lg bg-[#272C3E]">
                            <div class="card-title">
                                <p class="text-white font-semibold text-center mb-5">Stories</p>
                            </div>
                            <div class="story flex flex-col gap-3 ">
                                <div class="card-content flex items-center gap-3">
                                    <div class="user-profile">
                                        <img src="https://www.liveabout.com/thmb/rC2X0mQgPVCOmDclXeUtN16MiOA=/2250x1500/filters:fill(auto,1)/spongebob_wide-56a00f0a5f9b58eba4aeb6f2.jpg" class="w-[50px] h-[50px] rounded-full border-2 border-blue-500" alt="">
                                    </div>
                                    <div class="username">
                                        <p class="text-white font-semibold">SpongeBobMeming</p>
                                    </div>
                                </div>
                                <div class="card-content flex items-center gap-3">
                                    <div class="user-profile">
                                        <img src="https://tse3.mm.bing.net/th?id=OIP.tjUOUBGnthmW762mbRAFdQHaE8&pid=Api&P=0&h=180" class="w-[50px] h-[50px] rounded-full border-2 border-blue-500" alt="">
                                    </div>
                                    <div class="username">
                                        <p class="text-white font-semibold">John Mass</p>
                                    </div>
                                </div>
                                <div class="card-content flex items-center gap-3">
                                    <div class="user-profile">
                                        <img src="https://i.pinimg.com/originals/bc/af/18/bcaf18ce6054768da1628a939e2b4f65.jpg" class="w-[50px] h-[50px] rounded-full border-2 border-blue-500" alt="">
                                    </div>
                                    <div class="username">
                                        <p class="text-white font-semibold">Sad Boi</p>
                                    </div>
                                </div>
                                <div class="card-content flex items-center gap-3">
                                    <div class="user-profile">
                                        <img src="https://criticalhits.com.br/wp-content/uploads/2021/05/satoru-gojo.jpg" class="w-[50px] h-[50px] rounded-full border-2 border-blue-500" alt="">
                                    </div>
                                    <div class="username">
                                        <p class="text-white font-semibold">Satoru</p>
                                    </div>
                                </div>
                                <div class="card-content flex items-center gap-3">
                                    <div class="user-profile">
                                        <img src="https://i.pinimg.com/originals/ae/67/fe/ae67fe590aa67995dbc94c85af37d6bc.jpg" class="w-[50px] rounded-full border-2 border-blue-500" alt="">
                                    </div>
                                    <div class="username">
                                        <p class="text-white font-semibold">NanamiJustGoMalaysia</p>
                                    </div>
                                </div>
                                <div class="card-content flex items-center gap-3">
                                    <div class="user-profile">
                                        <img src="https://i.pinimg.com/originals/ae/67/fe/ae67fe590aa67995dbc94c85af37d6bc.jpg" class="w-[50px] rounded-full border-2 border-blue-500" alt="">
                                    </div>
                                    <div class="username">
                                        <p class="text-white font-semibold">NanamiJustGoMalaysia</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="trend mt-5">
                        <div class="card p-3 rounded-lg bg-[#272C3E] text-white">
                            <div class="card-title">
                                <p class="text-white font-semibold text-center mb-5">Trends for you</p>
                            </div>
                            <div class="card-content mt-8">
                                <div class="trend-card flex flex-col items-start gap-3">
                                    <p>#IndonesiaGOBRRR</p>
                                    <p>#IndonesiaEmas2045</p>
                                    <p>#StarRailing</p>
                                    <p>#ArtificialIntelligence</p>
                                    <p>#PHP_VS_Javascript</p>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection