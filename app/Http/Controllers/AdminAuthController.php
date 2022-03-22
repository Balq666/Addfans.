<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    //
    public function showLogin(){
        return view('admin.auth.login',[
            'title'=>'Admin Login'
        ]);
    }
    public function login(Request $request){
        $validatedData = $request->validate([
            'email'=>['required'],
            'password'=>['required']
        ]);
        if(Auth::guard('admin')->attempt($validatedData)){
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }
    }
}
