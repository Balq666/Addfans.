<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserRegisterController extends Controller
{
    //
    public function __construct(){
        $this->middleware('guest');
    }
    public function index(){
        return view('user.auth.register',[
            'title'=>'regsiter page'
        ]);
    }
    public function creator(){
        return view('user.auth.register-creator',[
            'title'=>'regsiter page'
        ]);
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'name'=>'required',
            'username'=>'required|alpha_dash|max:30',
            'email'=>'required|email',
            'password'=>['required',Password::min(8)->numbers()->mixedCase()->symbols(),'string']
        ]);
        $validatedData['password']= Hash::make($validatedData['password']);
        $user = User::create($validatedData);
        $user->assignRole('customer');
        $user->createWallet([
            'name'=>$user->name.' AddPay',
            'slug'=>$user->username.'-add-pay',
        ]);
        $user->getWallet($user->username.'-add-pay')->deposit(50000);
        // $user->deposit(50000);
        return redirect('/login')->with('successRegister','Sukses registrasi untuk data anda');
    }
    public function createCreator(Request $request){
        $validatedData = $request->validate([
            'name'=>'required',
            'username'=>'required|alpha_dash|max:30',
            'email'=>'required|email:dns',
            'password'=>['required',Password::min(8)->numbers()->mixedCase()->symbols(),'string']
        ]);
        $validatedData['password']= Hash::make($validatedData['password']);
        $user = User::create($validatedData);
        $user->assignRole('creator');
        $user->createWallet([
            'name'=>$user->name.' AddPay',
            'slug'=>$user->username.'-add-pay',
        ]);
        return redirect('/login')->with('successRegister','Sukses registrasi untuk data anda');
    }
}
