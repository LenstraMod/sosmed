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
   @if($post->user_id == Auth::user()->id)

       <div class="action">
        <div class="setting mx-5 flex flex-col items-center gap-3">
            <button class="dropdown-btn" onclick="toggleDropdownPost()">
            <i class="fa-solid fa-ellipsis-vertical text-xl"></i>
            </button>
            <div id="dropdownContentPost" class="absolute mt-5 hidden">
                <div class="flex flex-col p-1 rounded-md " >
                    <a href="{{ route('editPost', $post->id) }}" class="text-sm p-1 hover:text-[17px] duration-300 ease-out"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                    <a href="{{ route('deletePost', $post->id) }}" class="text-sm p-1 hover:text-[17px] duration-300 ease-out"><i class="fa-solid fa-trash"></i> Delete</a>
                </div>
            </div>
        </div>
       </div>
   @endif
   </div>
    <div class="card-image mb-3 flex justify-center">
        <img src="{{ asset('assets/images/post-images/' . $post->image) }}" class="rounded-lg" alt="">
    </div>
    <div class="card-content flex flex-col">
        <div class="title mb-3">
            <p class="font-poppins font-semibold text-xl">{{ $post->title }}</p>
        </div>
        <div class="sub">
            <p>{{ $post->content }}</p>
        </div>
        <div class="users_action flex items-center gap-2 mb-5 mt-2 text-xl">
            @include('frontend.components.action')
        </div>
        <div class="comment mt-5 p-6 bg-black rounded-lg">
            <div class="highlighted-comment">
                @foreach ($post->comments->take(3) as $comment )
                   @include('frontend.components.comment')
                @endforeach
            </div>

            <div class="user-comment mt-12 flex flex-col">
               <form action="{{ route('commentSubmit', $post->id) }}" method="post">
                    @csrf
                    <input type="text" name="comment" class="w-full bg-[#1E1E1E] text-white border-0 rounded-lg" placeholder="Comment Here">
                    <button type="submit" class="text-white bg-blue-700 p-2 mt-3 rounded-lg self-end font-semibold">Comment</button>
               </form>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleDropdownPost(){
        let dropdownContent = document.getElementById('dropdownContentPost');

        dropdownContent.style.display = (dropdownContent.style.display === 'block') ? 'none' : 'block';

    }
</script>
