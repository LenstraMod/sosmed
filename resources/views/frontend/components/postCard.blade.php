<div class="card bg-[#272C3E] rounded-lg p-5 shadow-lg mt-5">
    <div class="card-head flex gap-3 items-center mb-5">
        <div class="userProfile">
            <img src="{{ asset('assets/images/user-images/' . $post->user->photo) }}" class="w-[50px] rounded-full" alt="">
        </div>
        <div class="username">{{ $post->user->username }}</div>
        <div class="line">-</div>
        <div class="usertag text-[#869099]">{{$post->user->usertag }}</div>
    </div>
    <div class="card-image mb-3">
        <img src="{{ asset('assets/images/post-images/' . $post->image) }}" class="rounded-lg" alt="">
    </div>
    <div class="users_action flex gap-5 mb-5 mx-3 text-xl">
        <div class="like flex flex-col items-center">
            <livewire:like-button :postId="$post->id" :key="$post->id" />
            <p class="font-poppins text-sm">100K </p>
        </div>
        <div class="comment flex flex-col items-center">
            <i class="fa-regular fa-comment"></i>
            <p class="font-poppins text-sm">25.5K </p>
        </div>
        <div class="bookmark flex flex-col items-center">
            <livewire:bookmark />
            <p class="font-poppins text-sm">7.5K </p>
        </div>
        <div class="share flex flex-col items-center">
            <i class="fa-solid fa-share"></i>
            <p class="font-poppins text-sm">7.5K </p>
        </div>
    </div>
    <div class="card-content">
        <div class="title mb-3">
            <p class="font-poppins font-semibold text-xl">{{ $post->title }}</p>
        </div>
        <div class="sub">
            <p>{{ $post->content }}</p>
        </div>
        <div class="comment mt-5 p-6 bg-black rounded-lg">
            <div class="highlighted-comment">
                <div class="comment-head flex gap-3 items-center mb-5">
                    <div class="userProfile">
                        <img src="https://i.pinimg.com/originals/27/61/a2/2761a221bd1d6067ed6f27121bca949e.jpg" class="w-[25px] rounded-full" alt=" ">
                    </div>
                    <div class="username text-sm">SpongobobMemeing</div>
                    <div class="line text-sm">-</div>
                    <div class="usertag text-[#869099] text-xs">@patrickOnDisguise</div>
                </div>
                <div class="comment-content">
                    -- Bro Literally Swim on Morning frfr. Gonna get freeze early enough HAHA
                </div>
                <div class="comment-head flex gap-3 items-center mt-8 mb-5">
                    <div class="userProfile">
                        <img src="https://i.pinimg.com/originals/ae/67/fe/ae67fe590aa67995dbc94c85af37d6bc.jpg" class="w-[25px] rounded-full" alt=" ">
                    </div>
                    <div class="username text-sm">NanamiJustGoMalaysia</div>
                    <div class="line text-sm">-</div>
                    <div class="usertag text-[#869099] text-xs">@nanamirevived</div>
                </div>
                <div class="comment-content">
                    -- This is the beach episode bro. Becareful u dont want ur hand got eaten but numerous of massiv crab like me before ψ(｀∇´)ψ
                </div>
            </div>
            <div class="all-comment mt-5 flex gap-3">
                <p>See all Comment</p>
                <p>V</p>
            </div>
            <div class="user-comment mt-12 flex flex-col">
                <input type="text" class="w-full bg-[#1E1E1E] text-white border-0 rounded-lg" placeholder="Comment Here">
                <button class="text-white bg-blue-700 p-2 mt-3 rounded-lg self-end font-semibold">Comment</button>
            </div>
        </div>
    </div>
</div>
