<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use Livewire\Component;

class UserNotification extends Component
{
    public $readNotification;
    public $readOrNot;
    public function mount(){
        $this->readNotification = Notification::where([
            'user_to_notify'=>auth()->user()->id,
            'read'=>0
        ])->get();
        $this->readOrNot = ($this->readNotification->count() > 0) ? false : true;
    }
    public function render()
    {
        if($this->readNotification->count() > 0){
            $this->readOrNot = false;
        } else {
            $this->readOrNot = true;
        }
        return view('livewire.user-notification');
    }
}
