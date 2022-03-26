<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('adminauth:admin',['except'=>['logout']]);
    }
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
        if(Auth::guard('admin')->attempt(['email'=>$validatedData['email'],'password'=>$validatedData['password']])){
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }
    }
    public function logout(Request $request){
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/auth/login');
    }
}
