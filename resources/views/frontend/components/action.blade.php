  <div class="like">
    @if($post->likes->contains('user_id', Auth::id()))
    <form action="{{ route('unlike',$post->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit"><i class="fa-solid fa-heart text-red-600"></i></button>
    </form>
@else
<form action="{{ route('like',$post->id) }}" method="POST">
    @csrf
    <button type="submit"><i class="fa-regular fa-heart text-red-600" onmouseover="toggleLikeHover(this)"></i></button>
</form>
@endif
  </div>

   <div class="totalLike">
    <p class="font-poppins text-sm">{{ $post->likes()->count() }}</p>
   </div>

    <script>
        function toggleLikeHover(like) {
            like.classList.toggle('fa-regular');
            like.classList.toggle('fa-solid');
        }
    </script>

