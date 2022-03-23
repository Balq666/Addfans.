<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\ReportingPost;
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
        return redirect('/admin/dashboard/report')->with('successTakedown','Berhasil takedown postingan');
    }
}
