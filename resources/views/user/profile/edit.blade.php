@extends('user.layouts.app')
@section('content')
<div class="xl:w-3/5 lg:w-3/5 md:w-3/5 w-full border mx-auto p-5 rounded shadow my-3">
    <h1 class="text-2xl mb-2">Edit data profile</h1>
        <hr class="my-2">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Type your name here</label>
                <input type="text" name="name" id="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{old('name',$user->name)}}">
                @error('name')
                <p class="text-red-600 text-sm font-medium">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Type your username here</label>
                <input type="text" name="username" id="username" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{old('username',$user->username)}}">
                @error('username')
                <p class="text-red-600 text-sm font-medium">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Type your email here</label>
                <input type="text" name="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{old('email',$user->email)}}">
                @error('email')
                <p class="text-red-600 text-sm font-medium">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="bio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Type your bio here</label>
                <textarea name="bio" id="bio" cols="0" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                    {{ $user->bio }}
                </textarea>
                @error('bio')
                <p class="text-red-600 text-sm font-medium">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="profile" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Drop your profile here</label>
                <input type="file" name="profile" id="profile" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" >
                @error('profile')
                <p class="text-red-600 text-sm font-medium">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Type your password here</label>
                <input type="password" name="password" id="password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{old('password')}}">
                @error('password')
                <p class="text-red-600 text-sm font-medium">{{$message}}</p>
                @enderror
            </div>
        
            <button type="submit" class="text-white  font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">Submit your post</button>
        </form>
</div>
@endsection