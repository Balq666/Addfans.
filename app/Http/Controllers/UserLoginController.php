<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest',['except'=>'logout']);
    }
    public function show(){
        return view('user.login.index',[
            'title'=>'page login'
        ]);
    }
    public function login(Request $request){
        $validatedData = $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if(Auth::attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])){
            $request->session()->regenerate();
            return redirect('/');
        }
        return redirect()->back()->with('invalidLogin','Email invalid or password invalid');
    }
    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }
}
