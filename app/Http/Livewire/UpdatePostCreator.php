<?php

namespace App\Http\Livewire;

use App\Models\File;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdatePostCreator extends Component
{
    use WithFileUploads;
    public $post;
    public $title;
    public $slug;
    public $price;
    public $lessThan = false;
    public $pastThan = false;
    public $expired_date;
    public $tax;
    public $description;
    public $files;
    public $prePostFiles;
    public $thumbnail;
    public function mount(){
        $this->title = $this->post->title;
        $this->slug = $this->post->slug;
        $this->price = $this->post->price;
        $this->tax = $this->post->tax;
        $this->description = $this->post->description;
        $this->files = File::where('post_id',$this->post->id)->get();
    }
    public function removeFile($id){
        File::destroy($id);
    }
    public function removePrePostFile($key){
        unset($this->prePostFiles[$key]);
    }
    public function render()
    {
        if($this->title != null){
            $this->slug = str()->slug($this->title);
        } else {
            $this->slug = null;
        }
        if($this->price <= 5000){
            $this->lessThan = true;
        } else {
            $this->lessThan = false;
        }
        if($this->price != null){
            $this->tax = $this->price * 0.15;
        } else {
            $this->tax = 0;
        }
        $this->prePostFiles = $this->prePostFiles;
        $this->files = File::where('post_id',$this->post->id)->get();
        if($this->thumbnail != null){
            $this->thumbnailTemporary = $this->thumbnail;
        }
        return view('livewire.update-post-creator');
    }
    public function submit(){
        if($this->thumbnail){
            $thumbnailTemp = $this->thumbnail->store('/post-images');
            $posted = Post::find($this->post->id)->update([
                'title'=>$this->title,
                'slug'=>$this->slug,
                'price'=>$this->price,
                'tax'=>$this->tax,
                'description'=>$this->description,
                'thumbnail'=>$thumbnailTemp
            ]);
            if($this->prePostFiles != null){
                foreach($this->prePostFiles as $value){
                    $name = $value->getClientOriginalName();
                    $slug = SlugService::createSlug(File::class,'slug',$name);
                    $extension = $value->getClientOriginalExtension();
                    $path = $value->storeAs("/creator/files",$name);
                    File::create([
                        'post_id'=> $this->post->id,
                        'path'=>$path,
                        'title'=>$name,
                        'slug'=>$slug,
                        'extension'=> $extension
                    ]);
                }
            }
            return redirect('/posts/'.$this->slug.'/edit')->with('success','Telah berhasil mengupdate!');
        } else {
            $posted = Post::find($this->post->id)->update([
                'title'=>$this->title,
                'slug'=>$this->slug,
                'price'=>$this->price,
                'tax'=>$this->tax,
                'description'=>$this->description
            ]);
            if($this->prePostFiles != null){
                foreach($this->prePostFiles as $value){
                    $name = $value->getClientOriginalName();
                    $slug = SlugService::createSlug(File::class,'slug',$name);
                    $extension = $value->getClientOriginalExtension();
                    $path = $value->storeAs("/creator/files",$name);
                    File::create([
                        'post_id'=> $this->post->id,
                        'path'=>$path,
                        'title'=>$name,
                        'slug'=>$slug,
                        'extension'=> $extension
                    ]);
                }
            }
            return redirect('/posts/'.$this->slug.'/edit')->with('success','Telah berhasil mengupdate!');
        }



    }
}
