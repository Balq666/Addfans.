<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class UserNotificationController extends Controller
{
    //
    public function index(){
        return view('user.notification.index',[
            'title'=>'Notification page'
        ]);
    }
    public function show(Notification $notif){
        $notif->update([
            'read'=>1
        ]);
        $notif->save();
        return view('user.notification.show',[
            'title'=>'Show Notification page',
            'notification'=>$notif
        ]);
    }
}
