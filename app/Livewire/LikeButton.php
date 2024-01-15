<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\post;

class LikeButton extends Component
{
    public $isHovered = false;
    public $isLiked = false;
    public $postId;

    public function mount($postId){

        $this->postId = $postId;

    }

    public function like(){

        $this->isLiked = !$this->isLiked;
    }

    public function onMouseOver(){
        $this->isHovered = true;
    }

    public function onMouseOut(){
        $this->isHovered = false;
    }
    public function render()
    {
        return view('livewire.like-button',[
            'post' => post::find($this->postId)
        ]);
    }

    public function toggleLike(){
        $post = post::find($this->postId);
        $post->liked = !$post->liked;
        $post->save();
    }
}
