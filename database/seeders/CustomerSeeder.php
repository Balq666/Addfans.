<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i = 1; $i <= 20; $i++){
            $faker = Factory::create('id_ID');
            $gender = $faker->randomElement(['male','female']);
            $firstName = strtolower($faker->userName($gender));
            $user = User::create([
                'name'=>$faker->name($gender),
                'username'=>$firstName,
                'email'=>$firstName.'@gmail.com',
                'password'=>Hash::make('password')
            ]);
            $user->assignRole('customer');
            $user->createWallet([
                'name'=>$user->name.' AddPay',
                'slug'=>$user->username.'-add-pay',
            ]);
            $user->getWallet($user->username.'-add-pay')->deposit(50000);
        }
    }
}
