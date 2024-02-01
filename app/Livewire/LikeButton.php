<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\post;
use App\Models\Like;

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
        $post = post::find($this->postId);

        if($post){
             $likeCount = Like::where('post_id', $post->id)->count();

             return view('livewire.like-button', compact('likeCount'));
        }
    }

    public function toggleLike(){
        $post = post::find($this->postId);
        $like = new Like;


        $existedLike = Like::where('post_id', $post->id)
                            ->where('user_id', auth()->user()->id)
                            ->first();

        if($existedLike){
            $existedLike->liked = true;
            $existedLike->save();
        }
        else{
            $getLike = $like->liked = !$like->liked;
            $like->fill([
                'post_id' => $post->id,
                'user_id' => auth()->user()->id,
                'liked' => $getLike,
            ]);
            $like->save();
        }
    }
}
