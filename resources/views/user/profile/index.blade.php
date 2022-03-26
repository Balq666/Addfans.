{{-- @dd($transactions->getMetaProduct()) --}}
@extends('user.layouts.app')
@section('content')
    {{-- <p>total following : {{$total->count()}}</p> --}}
    <div class="content w-full">
        <div class="xl:container md:w-4/5 sm:w-4/5 w-11/12 mx-auto my-2  p-6 max-w-sm bg-blue-300 rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
            <div class="profile">
                @if ($user->id != auth()->user()->id)
                    @if (is_null($user->profile))
                    <img src="/img/user.png" alt="" class="mx-auto w-[150px] h-[150px] object-cover rounded-full shadow">
                    @else
                    <img src="/storage/{{ $user->profile }}" alt="" class="mx-auto w-[150px] h-[150px] object-cover rounded-full shadow">
                    @endif
                @else
                    @if (is_null($user->profile))
                    <img src="/img/user.png" alt="" class="mx-auto w-[150px] h-[150px] object-cover rounded-full shadow">
                    @else
                    <img src="/storage/{{ $user->profile }}" alt="" class="mx-auto w-[150px] h-[150px] object-cover rounded-full shadow">
                    @endif
                @endif
            </div>
        </div>
        <div class="xl:container md:w-4/5 sm:w-4/5 w-11/12 mx-auto my-2  p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
            @if (session()->has('successDeposit'))
            <div id="alert-1" class="flex p-4 mb-4 bg-blue-100 rounded-lg dark:bg-blue-200" role="alert">
                <svg class="flex-shrink-0 w-5 h-5 text-blue-700 dark:text-blue-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <div class="ml-3 text-sm font-medium text-blue-700 dark:text-blue-800">
                    {{ session('successDeposit') }}
                </div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-blue-100 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex h-8 w-8 dark:bg-blue-200 dark:text-blue-600 dark:hover:bg-blue-300" data-collapse-toggle="alert-1" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            @endif
            @if (session()->has('successEdit'))
            <div id="alert-1" class="flex p-4 mb-4 bg-blue-100 rounded-lg dark:bg-blue-200" role="alert">
                <svg class="flex-shrink-0 w-5 h-5 text-blue-700 dark:text-blue-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <div class="ml-3 text-sm font-medium text-blue-700 dark:text-blue-800">
                    {{ session('successEdit') }}
                </div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-blue-100 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex h-8 w-8 dark:bg-blue-200 dark:text-blue-600 dark:hover:bg-blue-300" data-collapse-toggle="alert-1" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            @endif

            <div class="profile-auth flex justify-between">
                <div class="auth-profile">
                    <div class="flex gap-x-4">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$user->name}}
                        </h5>
                        @if ($user->id != auth()->user()->id)
                            <livewire:profile-user :user="$user"/>
                        @endif
                    </div>
                    <p class="text-lg font-normal text-gray-700 dark:text-gray-400">{{'@'.$user->username}}</p>
                    @if ($user->id == auth()->user()->id)
                    <a href="/profile/{{auth()->user()->username}}/edit" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Edit
                        <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                    @endif
                </div>
                <div class="auth-following-or-follower md:hidden sm:hidden hidden lg:hidden xl:block ml-2">
                    <div class="flex w-full gap-x-4">
                        @if ($user->hasRole('creator'))
                            <div class="posts w-2/6">
                                <p class="mb-2 text-lg font-bold tracking-tight text-gray-900 ">Posts</p>
                                <p class="font-medium text-center text-lg text-gray-900">{{ $user->posts->count() }}</p>
                            </div>
                            <div class="following w-2/6">
                                <p class="mb-2 text-lg font-bold tracking-tight text-gray-900 ">Following</p>
                                <p class="font-medium text-center text-lg text-gray-900">{{ $user->followings->count() }}</p>
                            </div>
                            <div class="follower w-2/6 ">
                                <p class="mb-2 text-lg font-bold tracking-tight text-gray-900 ">Follower</p>
                                <p class="font-medium text-center text-lg text-gray-900">{{ $user->followers->count() }}</p>
                            </div>
                        @else
                            <div class="following w-2/4">
                                <p class="mb-2 text-lg font-bold tracking-tight text-gray-900 ">Following</p>
                                <p class="font-medium text-center text-lg text-gray-900">{{ $user->followings->count() }}</p>
                            </div>
                            <div class="follower w-2/4 ">
                                <p class="mb-2 text-lg font-bold tracking-tight text-gray-900 ">Follower</p>
                                <p class="font-medium text-center text-lg text-gray-900">{{ $user->followers->count() }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @if ($user->id == auth()->user()->id)
            <div class="xl:container w-11/12 mx-auto my-2 p-6 max-w-sm bg-blue-600 rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                <div class="text-white w-full flex">
                    <ion-icon name="wallet-outline" class="text-4xl"></ion-icon>
                    <p class=" text-3xl text-white ml-2">Balance</p>
                </div>

                <p class="mb-3 font-normal text-white dark:text-gray-400">Rp.{{number_format($balance)}}</p>
                <a href="/top-up/deposit" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white rounded-lg border border-white focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Topup
                    <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
        @endif

        <div class=" md:block block lg:block xl:hidden w-11/12 mx-auto my-2 p-6 max-w-sm bg-white border border-blue-500 rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
            <div class="following-or-follower flex">
                @if ($user->hasRole('creator'))
                    <div class="posts w-2/6">
                        <p class="mb-2 text-center text-xl font-bold tracking-tight text-blue-500 ">Posts</p>
                        <p class="font-medium text-center text-lg text-blue-500">{{ $user->posts->count() }}</p>
                    </div>
                    <div class="following w-2/6">
                        <p class="mb-2 text-xl text-center font-bold tracking-tight text-blue-500 ">Following</p>
                        <p class="font-medium text-center text-lg text-blue-500">{{ $user->followings->count() }}</p>
                    </div>
                    <div class="follower w-2/6 ">
                        <p class="mb-2 text-xl text-center font-bold tracking-tight text-blue-500 ">Follower</p>
                        <p class="font-medium text-center text-lg text-blue-500">{{ $user->followers->count() }}</p>
                    </div>
                @else
                <div class="following w-2/4">
                    <p class="mb-2 text-xl font-bold tracking-tight text-blue-500 ">Following</p>
                    <p class="font-medium text-lg text-blue-500">{{ $user->followings->count() }}</p>
                </div>
                <div class="follower w-2/4 ">
                    <p class="mb-2 text-xl font-bold tracking-tight text-blue-500 ">Follower</p>
                    <p class="font-medium text-lg text-blue-500">{{ $user->followers->count() }}</p>
                </div>
                @endif

            </div>
        </div>
    </div>
@endsection
