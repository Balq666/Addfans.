<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class UserPosts extends Component
{
    public $posts;
    public int $i;
    public $cantAdd;
    public function mount(){
        $this->posts = Post::whereIn('user_id',auth()->user()->followings->pluck('id'))->where('report_code_id','!=',4)->orderBy('created_at','asc')->limit(5)->get();
        $this->i =  $this->posts->count();
        $this->cantAdd = false;
    }
    public function addLimitPosts(){
        $TotalAllPosts = Post::whereIn('user_id',auth()->user()->followings->pluck('id'))->where('report_code_id','!=',4)->get()->count();
        $allPosts = Post::whereIn('user_id',auth()->user()->followings->pluck('id'))->where('report_code_id','!=',4)->get();
        if($this->posts->count() <= $TotalAllPosts){
            $this->posts = Post::whereIn('id',$allPosts->pluck('id'))->where('report_code_id','!=',4)->orderBy('created_at','asc')->limit($this->i + 5)->get();
            $this->i += 5;
        }
    }
    public function render()
    {
        $allPosts = Post::whereIn('user_id',auth()->user()->followings->pluck('id'))->where('report_code_id','!=',4)->get();
        if($allPosts->count() == $this->posts->count()){
            $this->cantAdd = true;
        }
        return view('livewire.user-posts');
    }
}
