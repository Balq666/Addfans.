<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\ReportingPost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $post = Post::find(1);
        for($i = 1; $i <= 30; $i++){
            ReportingPost::create([
                'user_id'=>$i,
                'post_id'=>$post->id,
                'message_complaint'=>'blablabla'
            ]);
        }
    }
}
