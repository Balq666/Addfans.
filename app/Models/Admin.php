<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Bavix\Wallet\Traits\HasWallet;
use Bavix\Wallet\Interfaces\Wallet;
use Bavix\Wallet\Traits\HasWallets;
use Bavix\Wallet\Traits\CanPay;
use Bavix\Wallet\Interfaces\Customer;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable implements Wallet, Customer
{
    use HasFactory,HasWallet, HasWallets, CanPay;
    protected $guarded = ['id'];
}
