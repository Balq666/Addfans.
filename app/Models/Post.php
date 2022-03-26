<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Bavix\Wallet\Interfaces\Customer;
use Cviebrock\EloquentSluggable\Sluggable;
use Bavix\Wallet\Interfaces\Product;
use Bavix\Wallet\Traits\HasWallet;
use App\Models\User;
class Post extends Model implements Product
{
    use HasFactory, HasWallet, Sluggable;
    protected $guarded = ['id'];

    public function canBuy(Customer $customer, int $quantity = 1, bool $force = false): bool
    {
        /**
         * If the service can be purchased once, then
         *  return !$customer->paid($this);
         */
        return true;
    }

    public function getAmountProduct(Customer $customer)
    {
        return $this->price;
    }

    public function getMetaProduct(): ?array
    {
        return [
            'title' => $this->title,
            'description' => 'Purchase of Product #' . $this->id,
        ];
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function report_code(){
        return $this->belongsTo(ReportCode::class);
    }
    public function sluggable() : array {
        return [
            'slug'=>[
                'source'=>'title'
            ]
        ];
    }
}
