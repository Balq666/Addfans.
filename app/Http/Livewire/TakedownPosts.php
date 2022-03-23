<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\ReportingPost;
use Livewire\Component;

class TakedownPosts extends Component
{
    public $reports;
    public function render()
    {
        $this->reports = ReportingPost::groupBy('post_id')
        ->selectRaw('count(post_id) as total, post_id')->get();
        return view('livewire.takedown-posts');
    }
    public function takedownAPost($post_id){
        // dd($post_id);
        Post::where('id',$post_id)->first()->update(['report_code_id'=>4]);
    }
}
