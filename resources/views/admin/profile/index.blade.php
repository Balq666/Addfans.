@extends('admin.layouts.app')
@section('content')
<div class="content w-full">
    <div class="xl:container md:w-4/5 sm:w-4/5 w-11/12 mx-auto my-2  p-6 max-w-sm bg-blue-300 rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <div class="profile">
            <img src="/img/user.png" alt="" class="mx-auto w-[150px] h-[150px] object-cover rounded-full shadow">
        </div>
    </div>
</div>
<div class="auth-profile xl:container md:w-4/5 sm:w-4/5 w-11/12 mx-auto my-2  p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
    <div class="flex gap-x-4">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$admin->name}}
        </h5>
    </div>
    <p class="text-lg font-normal text-gray-700 dark:text-gray-400">{{'@'.$admin->username}}</p>
</div>
<div class="xl:container w-11/12 mx-auto my-2 p-6 max-w-sm bg-blue-600 rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
    <div class="text-white w-full flex">
        <ion-icon name="wallet-outline" class="text-4xl"></ion-icon>
        <p class=" text-3xl text-white ml-2">Balance</p>
    </div>
    <p class="mb-3 font-normal text-white dark:text-gray-400">Rp.{{number_format($balance)}}</p>
</div>
@endsection
