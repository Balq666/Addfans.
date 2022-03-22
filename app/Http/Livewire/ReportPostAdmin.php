<?php

namespace App\Http\Livewire;

use App\Models\ReportingPost;
use Illuminate\Support\Facades\DB;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
class ReportPostAdmin extends LivewireDatatable
{
    public $model = ReportingPost::class;
    public function builder()
    {
        //
        return DB::table('reporting_posts')
        ->selectRaw('sum(post_id) as total');
    }

    public function columns()
    {
        //
        return [
            // Column::name('posts.title')
            // ->label('Post title'),
            Column::name('total')
            ->label('total complaint')
        ];
    }
}
