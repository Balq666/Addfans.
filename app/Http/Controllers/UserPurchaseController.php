<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Post;
use App\Models\Purchase;
use App\Models\User;
use Faker\Factory;
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
        Notification::create([
            'user_id'=>$customer->id,
            'user_to_notify'=>$post->user_id,
            'data_type_id'=>$post->id,
            'message'=>$customer->username.', telah membeli postingan kamu!',
            'slug'=>Factory::create('id_ID')->uuid(),
            'read'=>0
        ]);
        return redirect()->back()->with('successPay','Berhasil beli!');
    }
}
