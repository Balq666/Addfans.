<?php

namespace Database\Seeders;

use App\Models\ReportCode;
use App\Models\ReportingPost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class);
        $this->call(CreatorSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(ReportCodeSeeder::class);
        $this->call(ReportingSeeder::class);
    }
}
