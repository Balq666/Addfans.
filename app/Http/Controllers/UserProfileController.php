<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

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
            return view('user.profile.index',[
                'title'=>'Other user',
                'user'=>$user,
                'following'=>$user->followings->count(),
                'follower'=>$user->followers->count()
            ]);
        }else {
            return view('user.profile.index',[
                'title'=>'Other user',
                'user'=>$user,
                'balance'=>auth()->user()->getWallet(auth()->user()->username.'-add-pay')->balance,
                'followings'=>$user->followings->count(),
                'followers'=>$user->followers->count()
            ]);
        }
        return redirect('/')->with('cantAccess');
    }
    public function edit(User $user){
        return view('user.profile.edit',[
            'title'=>'Edit profile',
            'user'=>$user
        ]);
    }
    public function update(Request $request, User $user){
        $rules = [
            'name'=>['required','max:100'],
            'username'=>['required','max:50'],
            'email'=>['required','max:50'],
        ];
        if(!is_null($request->bio)){
            $rules['bio'] = ['required','max:500'];
        }
        if(!is_null($request->password)){
            $rules['password'] = ['required',Password::min(8)->symbols()->mixedCase()->numbers()];
        }
        $validatedData = $request->validate($rules);
        if($request->hasFile('profile')){
            $validatedData['profile'] = request()->file('profile')->store('user/profile/');
        }
        if($validatedData['password']){
            $validatedData['password'] = Hash::make($validatedData['password']);
        }
        $user->update($validatedData);
        return redirect('/profile/'.$user->username)->with('successEdit','Berhasil mengupdate data profile!');
    }
}
