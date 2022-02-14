<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('user.topup.index',[
            'title'=>'Topup page'
        ]);
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'deposit'=>['required','integer','min:10000'],
            'g-recaptcha-response' => ['required','captcha']
        ]);
        auth()->user()->getWallet(auth()->user()->username.'-add-pay')->deposit($validatedData['deposit']);
        return redirect('/profile/'.auth()->user()->username)->with('successDeposit','Berhasil deposit kewallet anda!');
    }
}
