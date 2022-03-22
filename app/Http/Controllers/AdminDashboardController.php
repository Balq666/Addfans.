<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    //
    public function index(){
        return view('admin.dashboard.index',[
            'title'=>'Dashboard admin'
        ]);
    }
    public function reports(){
        return view('admin.report.index',[
            'title'=>'All report post user'
        ]);
    }
}
