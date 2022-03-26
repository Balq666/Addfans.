<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Post;
use App\Models\ReportingPost;
use App\Models\Tax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('adminguest:admin');
    }
    public function index(){
        return view('admin.dashboard.index',[
            'title'=>'Dashboard admin',
            'tax'=>Tax::query()
            ->selectRaw('sum(tax) as total')->get()[0]['total']
        ]);
    }
    public function reports(){
        return view('admin.report.index',[
            'title'=>'All report post user',
            'reports'=>ReportingPost::query()
            ->groupBy('post_id')
            ->selectRaw('count(post_id) as total, post_id')->get()
        ]);
    }
    public function showTakedown(Post $post){
        return view('admin.report.show',[
            'title'=>'Show report post',
            'post'=>$post
        ]);
    }
    public function takedown(Request $request){
        Post::find($request->post_id)->update(['report_code_id'=>4]);
        return redirect('/admin/dashboard/reports')->with('successTakedown','Berhasil takedown postingan');
    }
    public function taxes(){
        return view('admin.taxes.index',[
            'title'=>'All tax',
            'taxes'=>Tax::query()
            ->groupBy('post_id')
            ->selectRaw('sum(tax) as total, post_id, count(user_id) as TotalCustomer')->get()
        ]);
    }
    public function profile(){
        return view('admin.profile.index',[
            'title'=>'Admin Profile page',
            'admin'=>auth('admin')->user(),
            'balance'=>auth('admin')->user()->getWallet(auth('admin')->user()->username.'-add-pay')->balance
        ]);
    }

}
