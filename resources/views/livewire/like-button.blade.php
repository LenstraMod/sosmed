
   <button wire:click='toggleLike'>
       @if($post->liked)
           <i class="fa-solid fa-heart text-red-500"></i>
       @else
           <i class="fa-regular fa-heart"></i>
       @endif
   </button>
