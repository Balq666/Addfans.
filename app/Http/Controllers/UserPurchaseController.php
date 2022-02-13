<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Http\Request;

class UserPurchaseController extends Controller
{
    //
    public function purchase(Post $post) {
        $customer = User::find(auth()->user()->id);
        $customer->getWallet($customer->username.'-add-pay')->pay($post);
        $user = User::find($post->user_id);
        $post->transfer($user->getWallet($user->username.'-add-pay'), $post->price);
        Purchase::create([
            'customer_id'=>$customer->id,
            'creator_id'=>$user->id,
            'post_id'=>$post->id
        ]);
        return redirect()->back()->with('successPay','Berhasil beli!');
    }
}
