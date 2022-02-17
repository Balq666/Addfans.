<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use Faker\Factory;
use Livewire\Component;
use Overtrue\LaravelFollow\UserFollower;

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
        Notification::create([
            'user_id'=>$this->userKe2->id,
            'user_to_notify'=>$this->user->id,
            'type'=>'follow',
            'data_type_id'=>UserFollower::where([
                'following_id'=>$this->user->id,
                'follower_id'=>$this->userKe2->id
            ])->first()->id,
            'message'=>$this->userKe2->username.', telah mengikuti anda saat ini!',
            'read'=>0,
            'slug'=>Factory::create()->uuid()
        ]);
    }
    public function unFollowUser(){
        Notification::destroy(Notification::where([
            'type'=>'follow',
            'data_type_id'=>UserFollower::where([
                'following_id'=>$this->user->id,
                'follower_id'=>$this->userKe2->id
            ])->first()->id
        ])->first()->id);
        $this->userKe2->unfollow($this->user);
    }
}
