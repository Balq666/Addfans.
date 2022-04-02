@extends('user.layouts.app')
@section('content')
@if (session()->has('successAddPost'))
<div id="alert-3" class="flex p-4 mb-4 bg-green-100 rounded-lg dark:bg-green-200" role="alert">
    <svg class="flex-shrink-0 w-5 h-5 text-green-700 dark:text-green-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    <div class="ml-3 text-sm font-medium text-green-700 dark:text-green-800">
    {{session('successAddPost')}}
    </div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-green-200 dark:text-green-600 dark:hover:bg-green-300" data-collapse-toggle="alert-3" aria-label="Close">
    <span class="sr-only">Close</span>
    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
</div>
@endif
@if ($posts->count() == 0)
<div id="alert-additional-content-4" class="p-4 mb-4 bg-purple-100 rounded-lg dark:bg-purple-200" role="alert">
    <div class="flex items-center">
        <svg class="mr-2 w-5 h-5 text-purple-700 dark:text-purple-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <h3 class="text-lg font-medium text-purple-700 dark:text-purple-800">Belom ada satupun post!</h3>
    </div>
    <div class="mt-2 mb-4 text-sm text-purple-700 dark:text-purple-800">
        Buatlah suatu post untuk meraih cuan dan berkarya diplatform kami!
    </div>
    <div class="flex">
        <a href="/posts/create" class="text-white flex items-center align-middle bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-purple-800 dark:hover:bg-purple-900">
            <i class="block text-xl mr-2"><ion-icon name="duplicate"></ion-icon></i>
            <p class="block p-0 m-0">CREATE</p>
        </a>
    </div>
  </div>
@else
<div id="alert-additional-content-4" class="p-4 mb-4 bg-purple-100 rounded-lg dark:bg-purple-200" role="alert">
    <div class="flex items-center">
        <svg class="mr-2 w-5 h-5 text-purple-700 dark:text-purple-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <h3 class="text-lg font-medium text-purple-700 dark:text-purple-800">Sudah ada postinganmu, buat lagi?</h3>
    </div>
    <div class="mt-2 mb-4 text-sm text-purple-700 dark:text-purple-800">
        Buatlah lebih banyak post untuk meraih lebih banyak cuan dan berkarya diplatform kami!
    </div>
    <div class="flex">
        <a href="/posts/create" class="text-white flex items-center align-middle bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-purple-800 dark:hover:bg-purple-900">
            <i class="block text-xl mr-2"><ion-icon name="duplicate"></ion-icon></i>
            <p class="block p-0 m-0">CREATE</p>
        </a>
    </div>
  </div>
<div class="xl:w-3/5 lg:w-3/5 md:w-3/5 w-full mx-auto">
    @foreach ($posts as $post)

    <div class="w-full bg-white my-2 rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <a href="/posts/{{$post->slug}}" class="block" >
            <div class="w-full border">
                <img class="w-full rounded-t-lg" src="/storage/{{$post->thumbnail}}" >
            </div>
        </a>
        <div class="p-5">
            <div class="kotak-luar w-full flex flex-wrap items-center justify-between">
                <div class="kotak-kiri xl:w-4/5 lg:w-4/5 md:w-4/5 sm:w-4/5 w-4/5">
                    <a href="/posts/{{$post->slug}}">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$post->title}}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$post->description}}</p>
                </div>
                <div class="kotak-kanan flex justify-end xl:w-1/5 lg:w-1/5 md:w-1/5 sm:w-1/5 w-1/5">
                    <a href="posts/{{$post->slug}}/edit" class="flex justify-center items-center text-2xl p-2 bg-purple-200 rounded text-purple-500">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </div>
            </div>
            @if ($post->expired_date == null)
                <p class="font-medium mb-2 rounded-xl p-2 w-max bg-green-200 text-sm text-green-700">Konten seumur hidup!</p>
                @else
                <p class="font-medium mb-2 rounded-xl p-2 w-max text-sm bg-blue-200 text-blue-700">expired : {{ \Carbon\Carbon::parse($post->expired_date)->locale('id_ID')->diffForHumans() }}</p>
                @endif
            <a href="/posts/{{$post->slug}}" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                See detail!
                <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
        </div>
    </div>

    @endforeach
</div>
@endif

@endsection
