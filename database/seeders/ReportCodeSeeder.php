<?php

namespace Database\Seeders;

use App\Models\ReportCode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ReportCode::create([
            'code'=>1,
            'message'=>'Postingan ini sudah lulus ketentuan komunitas kami'
        ]);
        ReportCode::create([
            'code'=>2,
            'message'=>'Postingan ini mungkin mengandung unsur-unsur yang melanggar ketentuan komunitas kami'
        ]);
        ReportCode::create([
            'code'=>3,
            'message'=>'Postingan ini tidak dapat dibeli karena melamnggar ketentuan kami'
        ]);
    }
}
