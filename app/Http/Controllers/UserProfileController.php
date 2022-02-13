<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('user.profile.index',[
            'title'=>'profile page',
            'balance'=>auth()->user()->getWallet(auth()->user()->username.'-add-pay')->balance,
        ]);
    }
    public function user(User $user){
        if($user->id != auth()->user()->id){
            return view('user.profile.user',[
                'title'=>'Other user',
                'user'=>$user
            ]);
        }
        return redirect('/')->with('cantAccess');
    }
}
