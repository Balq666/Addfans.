<?php

namespace App\Http\Controllers;

use App\Models\Revenue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserRevenueController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('user.revenue.index',[
            'title'=>'Revenue user page',
            'revenues'=>Revenue::select('*')->selectRaw('count(data_type_id) as TotalCustomer, sum(balance) as TotalBalance')->groupBy('data_type_id')->where('user_to_revenue',auth()->user()->id)->get()
        ]);
    }
}
