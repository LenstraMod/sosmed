<div class="comment-head flex gap-3 items-center mb-5">
    <div class="userProfile">
        @if(filter_var($comment->user->photo , FILTER_VALIDATE_URL))
            <img src="{{ $comment->user->photo }}" class="w-[25px] rounded-full" alt=" ">
        @else
            <img src="{{ asset('assets/images/user-images/' . $comment->user ->photo) }}" class="w-[50px] rounded-full" alt="">
        @endif
    </div>
    <div class="username text-sm">{{ $comment->user->username }}</div>
    <div class="line text-sm">-</div>
    <div class="usertag text-[#869099] text-xs">{{ $comment->user->usertag }}</div>
</div>
<div class="comment-content mb-6">
    -- {{ $comment->content }}
</div>
