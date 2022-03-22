@extends('user.layouts.app')
@section('head')
    <style>
        trix-toolbar [data-trix-button-group="file-tools"]{
            display: none;
        }
        .trix-button--icon-increase-nesting-level,
        .trix-button--icon-decrease-nesting-level,
        .trix-button--icon-link,
        .trix-button--icon-bold,
        .trix-button--icon-italic,
        .trix-button--icon-heading-1,
        .trix-button--icon-strike,
        .trix-button--icon-quote,
        .trix-button--icon-code,
        .trix-button--icon-bullet-list,
        .trix-button--icon-number-list,
        .trix-button-group--text-tools[data-trix-button-group="text-tools"],
        .trix-button-group--block-tools[data-trix-button-group="block-tools"] { display: none; }


    </style>
@endsection
@section('content')
<div class="xl:w-3/5 lg:w-3/5 md:w-3/5 w-full border mx-auto p-3 bg-white shadow rounded">
    <div class="w-full">
        @if (session()->has('successPay'))
        <div id="alert-3" class="flex p-4 mb-4 bg-green-100 rounded-lg dark:bg-green-200" role="alert">
            <svg class="flex-shrink-0 w-5 h-5 text-green-700 dark:text-green-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div class="ml-3 text-sm font-medium text-green-700 dark:text-green-800">
            {{session('successPay')}}
            </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-green-200 dark:text-green-600 dark:hover:bg-green-300" data-collapse-toggle="alert-3" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        @endif
        @if (session()->has('failedPay'))
        <div id="alert-3" class="flex p-4 mb-4 bg-red-100 rounded-lg dark:bg-red-200" role="alert">
            <svg class="flex-shrink-0 w-5 h-5 text-red-700 dark:text-red-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div class="ml-3 text-sm font-medium text-red-700 dark:text-red-800">
            {{session('failedPay')}}
            </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-red-200 dark:text-red-600 dark:hover:bg-red-300" data-collapse-toggle="alert-3" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        @endif
        @if (session()->has('successStoreComplaint'))
        <div id="alert-3" class="flex p-4 mb-4 bg-green-100 rounded-lg dark:bg-green-200" role="alert">
            <svg class="flex-shrink-0 w-5 h-5 text-green-700 dark:text-green-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div class="ml-3 text-sm font-medium text-green-700 dark:text-green-800">
            {{session('successStoreComplaint')}}
            </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-green-200 dark:text-green-600 dark:hover:bg-green-300" data-collapse-toggle="alert-3" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        @endif
    </div>
    <div class="w-full h-52 overflow-hidden">
        @if (is_null($post->thumbnail))
        <img src="https://source.unsplash.com/800x400/?random" alt="" class="w-full h-full object-cover  border-2">
        @else
        <img src="/storage/{{$post->thumbnail}}" alt="" class="-mt-[200px]  border-2 w-full">
        @endif
    </div>
    @if (!is_null($report))

    @if ($report->user_id == auth()->user()->id)
    <div class="headtitle w-full flex flex-wrap gap-y-3 mb-4 items-center">
        {{-- <p class="text-2xl font-medium mt-2 xl:w-4/5 lg:w-4/5 md:w-full sm:w-3/5 w-full">{{$post->title}}</p> --}}
        <div class="paham-kiri xl:w-4/5 lg:w-4/5 md:w-4/5 sm:w-4/5 w-4/5">
            <h1 class="text-2xl font-medium">{{ $post->title }}</h1>
            <p class="text-sm font-medium mt-2 ">didukung oleh : {{number_format($allPayer)}} orang</p>
        </div>
        <div class="paham-kanan xl:w-1/5 lg:w-1/5 md:w-1/5 sm:w-1/5 w-1/5">
            <button class="w-full text-right text-red-500 hover:text-red-600" type="button">
                <i class="fa-solid fa-flag"></i>
            </button>
        </div>
    </div>
    @else
    <div class="headtitle w-full flex flex-wrap gap-y-3 mb-4 items-center">
        {{-- <p class="text-2xl font-medium mt-2 xl:w-4/5 lg:w-4/5 md:w-full sm:w-3/5 w-full">{{$post->title}}</p> --}}
        <div class="paham-kiri xl:w-4/5 lg:w-4/5 md:w-4/5 sm:w-4/5 w-4/5">
            <h1 class="text-2xl font-medium">{{ $post->title }}</h1>
            <p class="text-sm font-medium mt-2 ">didukung oleh : {{number_format($allPayer)}} orang</p>
        </div>
        <div class="paham-kanan xl:w-1/5 lg:w-1/5 md:w-1/5 sm:w-1/5 w-1/5">
            <button class="w-full text-right hover:text-red-600" type="button" data-modal-toggle="large-modal">
                <i class="fa-regular fa-flag "></i>
            </button>
        </div>
    </div>
    @endif
    @else
    <div class="headtitle w-full flex flex-wrap gap-y-3 mb-4 items-center">
        {{-- <p class="text-2xl font-medium mt-2 xl:w-4/5 lg:w-4/5 md:w-full sm:w-3/5 w-full">{{$post->title}}</p> --}}
        <div class="paham-kiri xl:w-4/5 lg:w-4/5 md:w-4/5 sm:w-4/5 w-4/5">
            <h1 class="text-2xl font-medium">{{ $post->title }}</h1>
            <p class="text-sm font-medium mt-2 ">didukung oleh : {{number_format($allPayer)}} orang</p>
        </div>
        <div class="paham-kanan xl:w-1/5 lg:w-1/5 md:w-1/5 sm:w-1/5 w-1/5">
            <button class="w-full text-right hover:text-red-600" type="button" data-modal-toggle="large-modal">
                <i class="fa-regular fa-flag "></i>
            </button>
        </div>
    </div>
    @endif

    <p class="text-sm font-medium mt-2 mb-3">{{$post->description}}</p>

    @if (auth()->user()->hasRole('customer'))
        @if (!$nilaiKebenaran)
            <div class="batas w-full flex items-center mb-3">
                <div class="line w-2/6 h-1 bg-blue-400 rounded"></div>
                <p class="w-2/6 text-center font-medium">Batas dukungan</p>
                <div class="line w-2/6 h-1 bg-blue-400 rounded"></div>
            </div>
            <form action="/posts/{{$post->slug}}/purchase" method="POST" class="flex flex-wrap items-center justify-center w-full p-2 h-40 bg-gray-100 rounded">
                @csrf
                <div class="contentForm h-max w-max">
                    <button type="submit" class="block mb-3 text-white mx-auto bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ 'Rp'.number_format($post->price) }}</button>
                    <p class="font-medium">Dukung untuk mendapatkan benefit!</p>
                </div>
            </form>
            <hr class="my-2">
            @if ($files->count() != 0)
            <p class="font-medium">Beli terlebih dahulu sebelum melihat file tambahan dipostingn ini!</p>
            @else
            <p class="font-medium">Tidak terdapat konten file dalam post ini!</p>
            @endif

        @else
            <div class="batas w-full flex items-center mb-3">
                <div class="line w-2/6 h-1 bg-blue-400 rounded"></div>
                <p class="w-2/6 text-center font-medium">Anda sudah mendukung!</p>
                <div class="line w-2/6 h-1 bg-blue-400 rounded"></div>
            </div>
            @foreach ($files as $file)
            <a href="/storage/creator/files/{{ $file->slug }}" class="w-full ">
                <p class="p-2 border shadow rounded my-2 mx-auto">{{ $file->title }}</p>
            </a>
            @endforeach
        @endif
    @else
    <div class="batas w-full flex items-center">
        <div class="line w-2/6 h-1 bg-blue-400 rounded"></div>
        <p class="w-2/6 text-center">Files yang terkait</p>
        <div class="line w-2/6 h-1 bg-blue-400 rounded"></div>
    </div>
    @foreach ($files as $file)
            <a href="/storage/creator/files/{{ $file->slug }}" class="w-full ">
                <p class="p-2 border shadow rounded my-2 mx-auto">{{ $file->title }}</p>
            </a>
    @endforeach

    @endif
    <livewire:user-comment-post :post="$post"/>
</div>
<div id="large-modal" tabindex="-1" data-modal-placement="center-center" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-4xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                    Large modal
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="large-modal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            <!-- Modal body -->
            <form action="" method="post">
                @csrf
                <div class="p-6 space-y-6">
                    <p>Ada keluhan?</p>
                    <div class="p-2 border-2 border-blue-500 rounded-b mb-2">
                        <input type="hidden" name="keluhan" id="keluhan">
                        <trix-editor input="keluhan"></trix-editor>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <button data-modal-toggle="large-modal" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kirim</button>
                    <button data-modal-toggle="large-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Batal</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        document.addEventListener('trix-file-accept',function(e){
            e.preventDefault();
        });
    </script>
@endsection
