<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreatePostCreatorWithExpired extends Component
{
    public $title;
    public $slug;
    public $price;
    public $lessThan = false;
    public $pastThan = false;
    public $expired_date;
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
        if($this->expired_date != null){
            if(Carbon::parse($this->expired_date)->lessThanOrEqualTo(Carbon::now())){
                $this->pastThan = true;
            } else {
                $this->pastThan = false;
            }
        }
        return view('livewire.create-post-creator-with-expired');
    }
}
