<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Post;
use App\Models\Purchase;
use App\Models\ReportingPost;
use Carbon\Carbon;
// use Storage
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;
class CreatorPostController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        if(auth()->user()->hasRole("creator")){
            return view('user.creator.posts.index',[
                'title'=>'My all posts',
                'posts'=>Post::where('user_id',auth()->user()->id)->get()
            ]);
        } else {

            return view('user.customer.posts.index',[
                'title'=>'My all posts',
            ]);
        }
    }
    public function store(Request $request){
        if(isset($request->expired_date)){
            $validator = Validator::make($request->all(),[
                'title'=>['required','max:150','min:10'],
                'slug'=>['required','unique:posts'],
                'price'=>['required','numeric','min:5000'],
                'description'=>['required','string'],
                'thumbnail'=>['required','image','file','max:5256'],
                'expired_date'=>['required'],
                'tax'=>['required']
            ])->validate();
            $validator['thumbnail'] = $request->file('thumbnail')->store('/post-images');
            $post = Post::create([
                'title'=>$validator['title'],
                'slug'=>$validator['slug'],
                'price'=>$validator['price'],
                'description'=>$validator['description'],
                'thumbnail'=>$validator['thumbnail'],
                'expired_date'=>Carbon::parse($validator['expired_date']),
                'user_id'=>auth()->user()->id,
                'tax'=>$validator['tax'],
                'report_code_id'=>1
            ]);
            if($request->hasFile('files')){
                foreach($request->file('files') as $value){
                    $name = $value->getClientOriginalName();
                    $slug = SlugService::createSlug(File::class,'slug',$name);
                    $extension = $value->getClientOriginalExtension();
                    $path = $value->storeAs("/creator/files",$name);
                    File::create([
                        'post_id'=> $post->id,
                        'path'=>$path,
                        'title'=>$name,
                        'slug'=>$slug,
                        'extension'=> $extension
                    ]);
                }
                return redirect('/posts')->with('successAddPost','Berhasil mengupload postingan kamu!');
            }
            return redirect('/posts')->with('successAddPost','Berhasil mengupload postingan kamu!');
        }else{
            $validator = Validator::make($request->all(),[
                'title'=>['required','max:150','min:10'],
                'slug'=>['required','unique:posts'],
                'price'=>['required','numeric','min:5000'],
                'description'=>['required','string'],
                'thumbnail'=>['required','image','file','max:5256'],
                'tax'=>['required']
            ])->validate();
            $validator['thumbnail'] = $request->file('thumbnail')->store('/post-images');
            $post = Post::create([
                'title'=>$validator['title'],
                'slug'=>$validator['slug'],
                'price'=>$validator['price'],
                'description'=>$validator['description'],
                'thumbnail'=>$validator['thumbnail'],
                'expired_date'=>null,
                'user_id'=>auth()->user()->id,
                'tax'=>$validator['tax'],
                'report_code_id'=>1
            ]);
            if($request->hasFile('files')){
                foreach($request->file('files') as $value){
                    $name = $value->getClientOriginalName();
                    $slug = SlugService::createSlug(File::class,'slug',$name);
                    $extension = $value->getClientOriginalExtension();
                    $path = $value->storeAs("/creator/files",$name);
                    File::create([
                        'post_id'=> $post->id,
                        'path'=>$path,
                        'title'=>$name,
                        'slug'=>$slug,
                        'extension'=> $extension
                    ]);
                }
                return redirect('/posts')->with('successAddPost','Berhasil mengupload postingan kamu!');
            }
            return redirect('/posts')->with('successAddPost','Berhasil mengupload postingan kamu!');
        }
    }
    public function edit(Post $post){
        if(auth()->user()->hasRole("creator")){
            if($post->user_id == auth()->user()->id){
                return view('user.creator.posts.edit',[
                    'post'=>$post,
                    'title'=>'Edit your post!'
                ]);
            } else {
                return redirect('/posts');
            }
        }
    }
    public function update(){

    }
    public function destroy(){

    }
    public function create(){
        if(auth()->user()->hasRole("creator")){
            return view('user.creator.posts.create',[
                'title'=>'Create my post',
            ]);
        }
        abort(403, 'THIS ACTION IS NOT ALLOWED FOR USER ROLE CUSTOMER!');
    }
    public function show(Post $post){
        if($post->report_code_id == 4){
            return redirect('/posts');
        } else {
            $AllPayer = Purchase::where('post_id',$post->id)->get()->count();
            $files = File::where('post_id',$post->id)->get();
            if(auth()->user()->hasRole('creator')){
                $nilaiKebenaran = auth()->user()->getWallet(auth()->user()->username.'-add-pay')->paid($post);
                $report = ReportingPost::where(['user_id'=>auth()->user()->id,
            'post_id'=>$post->id])->first();
                return view('user.creator.posts.show',[
                    'title'=>'Show detail my post',
                    'post'=>$post,
                    'allPayer'=>$AllPayer,
                    'files'=>$files,
                    'nilaiKebenaran'=>$nilaiKebenaran,
                    'report'=>$report
                ]);
            } else {
                $nilaiKebenaran = auth()->user()->getWallet(auth()->user()->username.'-add-pay')->paid($post);
                $AllPayer = Purchase::where('post_id',$post->id)->get()->count();
                $report = ReportingPost::where(['user_id'=>auth()->user()->id,
                'post_id'=>$post->id])->first();
                return view('user.creator.posts.show',[
                    'title'=>'Show detail my post',
                    'post'=>$post,
                    'nilaiKebenaran'=>$nilaiKebenaran,
                    'allPayer'=>$AllPayer,
                    'files'=>$files,
                    'report'=>$report
                ]);
            }
            abort(403, 'THIS ACTION IS NOT ALLOWED FOR USER ROLE CUSTOMER!');
        }

    }
    public function showFile(File $file){
        return Storage::download($file->path);
    }
    public function discoverPosts(){
        if(auth()->user()->hasRole('creator')){
            return view('user.creator.discover.posts.index',[
                'title'=>'All your following user posts'
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function storeComplaint(Request $request, Post $post){
        $validatedData = $request->validate([
            'keluhan'=>['required']
        ]);
        ReportingPost::create([
            'user_id'=>auth()->user()->id,
            'post_id'=>$post->id,
            'message_complaint'=>$validatedData['keluhan']
        ]);
        return redirect()->back()->with('successStoreComplaint','Terima kasih atas perhatian kamu, kami akan olah datanya!');
    }
}
