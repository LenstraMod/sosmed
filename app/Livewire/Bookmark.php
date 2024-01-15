<?php

namespace App\Livewire;

use Livewire\Component;

class Bookmark extends Component
{
    public $isHovered = false;
    public $isBookmarked = false;

    public function bookmark(){

        $this->isBookmarked = !$this->isBookmarked;
    }

    public function onMouseOver(){
        $this->isHovered = true;
    }

    public function onMouseOut(){
        $this->isHovered = false;
    }
    public function render()
    {
        return view('livewire.bookmark');
    }
}
