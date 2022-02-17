<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use Livewire\Component;

class UserNotificationLoop extends Component
{
    public $notification;
    public int $i;
    public $cantAdd;
    public function mount(){
        $this->notification = Notification::where('user_to_notify',auth()->user()->id)->orderBy('created_at')->limit(5)->get();
        $this->i =  $this->notification->count();
        $this->cantAdd = false;
    }
    public function addLimitNotif(){
        $TotalAllNotification = Notification::where('user_to_notify',auth()->user()->id)->get()->count();
        if($this->notification->count() <= $TotalAllNotification){
            $this->notification = Notification::where('user_to_notify',auth()->user()->id)->orderBy('created_at')->limit($this->i+5)->get();
            $this->i += 5;
        } 
    }
    public function render()
    {
        $allNotif = Notification::where('user_to_notify',auth()->user()->id)->get();
        if($allNotif->count() == $this->notification->count()){
            $this->cantAdd = true;
        }
        return view('livewire.user-notification-loop');
    }
}
