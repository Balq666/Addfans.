@extends('user.layouts.app')
@section('content')
<div class="xl:w-3/5 lg:w-3/5 md:w-3/5 w-full border mx-auto p-5 rounded shadow my-3">
    <h1 class="text-2xl mb-2">Deposit e Wallet</h1>
    <hr class="my-2">
    <form action="" method="POST">
        @csrf
        <div class="mb-6">
            <label for="deposit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Drop your files here</label>
            <input type="number" name="deposit" id="deposit" multiple class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" >
            @error('deposit')
            <p class="text-red-600 text-sm font-medium">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
</div>
@endsection