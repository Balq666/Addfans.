@extends('admin.layouts.app')
@section('content')
<div class="xl:w-3/5 lg:w-3/5 md:w-3/5 sm:w-3/5 w-11/12 mx-auto">
    <div class="w-full bg-white my-2 rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <a href="/posts/{{$post->slug}}" class="block" >
            <div class="w-full border">
                @if (is_null($post->thumbnail))
                <div class="w-full border">
                    <img class="w-full rounded-t-lg" src="https://source.unsplash.com/800x400/?random" >
                </div>
                @else
                <div class="w-full border">
                    <img class="w-full rounded-t-lg" src="/storage/{{$post->thumbnail}}" >
                </div>
                @endif
            </div>
        </a>
        <div class="p-5">
            <a href="/posts/{{$post->slug}}">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$post->title}}</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$post->description}}</p>
            <form action="" method="POST">
                @csrf
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <button type="submit" class="p-2 bg-blue-500 rounded text-white">Takedown</button>
            </form>
        </div>
    </div>
</div>
@endsection
