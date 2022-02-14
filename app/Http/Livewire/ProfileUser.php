<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProfileUser extends Component
{
    public $user;
    public $userKe2;
    public function render()
    {
        $this->userKe2 = auth()->user();

        return view('livewire.profile-user');
    }
    public function followUser(){
        $this->userKe2->follow($this->user);
    }
    public function unFollowUser(){
        $this->userKe2->unfollow($this->user);
    }
}
