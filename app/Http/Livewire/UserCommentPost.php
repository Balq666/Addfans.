<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class UserCommentPost extends Component
{
    public $comment;
    public $post;
    public $comments;
    protected $rules = [
        'comment' => 'required',
    ];
    public function mount(){
        $this->comments = Comment::where('post_id',$this->post->id)->get();
    }
    public function sendComment(){
        $this->validate();
        Comment::create([
            'post_id'=>$this->post->id,
            'user_id'=>auth()->user()->id,
            'comment'=> htmlspecialchars($this->comment)
        ]);
        $this->reset('comment');
    }
    
    public function render()
    {
        $this->comments = Comment::where('post_id',$this->post->id)->get();
        return view('livewire.user-comment-post');
    }
}
