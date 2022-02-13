@extends('user.layouts.app')
@section('content')
<div class="xl:w-3/5 lg:w-3/5 md:w-3/5 w-full border mx-auto p-5 rounded shadow my-3">
<h1 class="text-2xl mb-2">Create post</h1>
<hr class="my-2">
<form action="/posts/create" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-6">
        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Type your title here</label>
        <input type="title" name="title" id="title" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{old('title')}}">
        @error('title')
        <p class="text-red-600 text-sm font-medium">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-6">
        <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Type your slug here</label>
        <input type="slug" name="slug" id="slug" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{old('title')}}">
        @error('slug')
        <p class="text-red-600 text-sm font-medium">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-6">
        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Type your price here</label>
        <input type="number" name="price" id="price" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{old('price')}}">
        @error('price')
        <p class="text-red-600 text-sm font-medium">{{$message}}</p>
        @else
        <p class="text-gray-500 font-medium text-sm">Harus lebih dari 5000</p>
        @enderror
    </div>
    <div class="mb-6">
        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Type your description here</label>
        <textarea type="text" name="description" id="description" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{old('description')}}">
        </textarea>
        @error('description')
        <p class="text-red-600 text-sm font-medium">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-6">
        <label for="expired_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Type your expired date here</label>
        <input type="date" name="expired_date" id="expired_date" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{old('expired_date')}}">
        @error('expired_date')
        <p class="text-red-600 text-sm font-medium">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-6">
        <label for="thumbnail" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Drop your thumbnail here</label>
        <input type="file" name="thumbnail" id="thumbnail" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" >
        @error('thumbnail')
        <p class="text-red-600 text-sm font-medium">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-6">
        <label for="files" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Drop your files here</label>
        <input type="file" name="files[]" id="files" multiple class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" >
        @error('files')
        <p class="text-red-600 text-sm font-medium">{{$message}}</p>
        @enderror
    </div>

    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit your post</button>
</form>
</div>
@endsection
