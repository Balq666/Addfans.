<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class CreatePostCreator extends Component
{
    
    // public function createSlug(){
    //     $this->slug = str()->slug($this->slug);
    // }
    public $tab;
    public function mount(){
        $this->tab = 'with';
    }
    public function setTab($tab){
        $this->tab = $tab;
    }
    public function render()
    {
        
        return view('livewire.create-post-creator');
    }
}
