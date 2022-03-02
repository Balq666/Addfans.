<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserSearchCreatorController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('user.search.creator.index',[
            'title'=>'User search creator'
        ]);
    }
}
