<?php

namespace App\Console;

use App\Models\Post;
use App\Models\ReportingPost;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function(){
            Post::whereRaw('expired_date <= now()')->delete();
            if(ReportingPost::query()
                ->groupBy('post_id')
                ->selectRaw('count(post_id) as total, post_id')->get()->whereBetween('total',[1,10])->count() >= 0){
                    $post_id = ReportingPost::query()
                    ->groupBy('post_id')
                    ->selectRaw('count(post_id) as total, post_id')->get()->whereBetween('total',[1,10])->pluck('post_id')->toArray();
                    Post::whereIn('id',$post_id)->update(['report_code_id'=>2]);
                }
                if(ReportingPost::query()
                ->groupBy('post_id')
                ->selectRaw('count(post_id) as total, post_id')->get()->whereBetween('total',[11,29])->count() >= 0){
                    $post_id = ReportingPost::query()
                    ->groupBy('post_id')
                    ->selectRaw('count(post_id) as total, post_id')->get()->whereBetween('total',[11,29])->pluck('post_id')->toArray();
                    Post::whereIn('id',$post_id)->update(['report_code_id'=>3]);
                }
                if(ReportingPost::query()
                ->groupBy('post_id')
                ->selectRaw('count(post_id) as total, post_id')->get()->where('total','>=',30)->count() >= 0) {
                    $post_id = ReportingPost::query()
                    ->groupBy('post_id')
                    ->selectRaw('count(post_id) as total, post_id')->get()->where('total','>=',30)->pluck('post_id')->toArray();
                    Post::whereIn('id',$post_id)->update(['report_code_id'=>4]);
                }
        })->everyMinute()->timezone('Asia/Jakarta');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
