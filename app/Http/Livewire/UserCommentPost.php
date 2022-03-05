<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;
class UserCommentPost extends Component
{
    public $comment;
    public $post;
    public $comments;
    public $editComment;
    public $isEditComment;
    public $idComment;
    protected $rules = [
        'comment' => 'required',
    ];
    public function mount(){
        $this->comments = Comment::where('post_id',$this->post->id)->get();
        $this->isReplyComment = false;
    }
    public function sendComment(){
        $this->comment = nl2br(htmlspecialchars($this->comment));
        $this->validate();
        Comment::create([
            'post_id'=>$this->post->id,
            'user_id'=>auth()->user()->id,
            'comment'=> $this->comment
        ]);
        $this->reset('comment');
    }
    public function sendDeleteComment($id){
        if($this->isEditComment){
            $this->isEdit($id);
        } else {
            $this->isEdit($id);
        }
        Comment::destroy($id);
    }
    public function sendEditComment($id){
        Comment::find($id)->update([
            'comment'=>nl2br(htmlspecialchars($this->editComment))
        ]);
        $this->editComment = null;
        $this->isEditComment = false;
        $this->idComment = null;
    }
    public function isEdit($id){

        if($this->isEditComment){
            $this->isEditComment = false;
            $this->idComment = null;
            $this->editComment = null;
        } else {
            $this->idComment = $id;
            $this->isEditComment = true;
            $this->editComment = str_replace('<br />','',Comment::find($id)->comment);
        }
    }
    public function render()
    {
        $this->comments = Comment::where('post_id',$this->post->id)->get();
        return view('livewire.user-comment-post');
    }
}
