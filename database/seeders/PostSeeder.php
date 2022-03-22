<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 80; $i++){
            $faker = Factory::create('id_ID');
            $judul = $faker->sentence(6);
            $slug = SlugService::createSlug(Post::class,'slug',$judul);
            $price = $faker->randomElement([10_000,15_000,7_000,20_000,30_000]);
            $user_id = $faker->randomElement(User::whereBetween('id',[1,20])->get()->pluck('id'));
            Post::create([
                'title'=>$judul,
                'slug'=>$slug,
                'report_code_id'=>1,
                'description'=>$faker->text(300),
                'price'=>$price,
                'expired_date'=>Carbon::createFromDate(2022,3,13),
                'thumbnail'=>null,
                'user_id'=>$user_id
            ]);
        }
    }
}
