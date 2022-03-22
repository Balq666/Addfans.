<?php

use App\Models\Post;
use App\Models\ReportCode;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_report_codes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Post::class)->nullable();
            $table->foreignIdFor(ReportCode::class)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_report_codes');
    }
};
