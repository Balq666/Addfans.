<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Notification;
use App\Models\Post;
use App\Models\Purchase;
use App\Models\Revenue;
use App\Models\Tax;
use App\Models\User;
use Faker\Factory;
use Illuminate\Http\Request;

class UserPurchaseController extends Controller
{
    //
    public function purchase(Post $post) {
        $customer = User::find(auth()->user()->id);
        if($customer->getWallet($customer->username.'-add-pay')->safePay($post)){
            $user = User::find($post->user_id);
            $post->transfer($user->getWallet($user->username.'-add-pay'), $post->price);
            $admin = Admin::find(1);
            $customer->getWallet($customer->username.'-add-pay')->transfer($admin->getWallet($admin->username.'-add-pay'), $post->tax);
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
            Revenue::create([
                'user_id'=>$customer->id,
                'user_to_revenue'=>$post->user_id,
                'post_id'=>$post->id,
                'balance'=>$post->price,
                'tax'=>$post->tax
            ]);
            Tax::create([
                'post_id'=>$post->id,
                'user_id'=>$customer->id,
                'tax'=>$post->tax
            ]);
            return redirect()->back()->with('successPay','Berhasil beli!');
        } else {
            return redirect()->back()->with('failedPay','Gagal membeli karna saldo kurang!');
        }

    }
}
