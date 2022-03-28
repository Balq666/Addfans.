<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreatePostCreatorWithoutExpired extends Component
{
    public $title;
    public $slug;
    public $price, $tax;
    public $lessThan = false;
    public function mount(){
        $this->price = 0;
    }
    public function render()
    {
        if($this->title != null){
            $this->slug = str()->slug($this->title);
        } else {
            $this->slug = null;
        }
        if($this->price <= 5000){
            $this->lessThan = true;
        } else {
            $this->lessThan = false;
        }
        if($this->price != null){
            $this->tax = $this->price * 0.15;
        } else {
            $this->tax = 0;
        }
        return view('livewire.create-post-creator-without-expired');
    }
}
