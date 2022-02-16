<div>
    {{-- Stop trying to control. --}}
    <div class="xl:w-3/5 lg:w-3/5 md:w-3/5 sm:w-3/5 w-11/12 mx-auto">
        @foreach ($posts as $post)
    
        <div class="w-full bg-white rounded-lg my-2 border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
            <a href="/posts/{{$post->slug}}" class="block" >
                @if (is_null($post->thumbnail))
                <div class="w-full border">
                    <img class="w-full rounded-t-lg" src="https://source.unsplash.com/800x400/?random" >
                </div>
                @else
                <div class="w-full border">
                    <img class="w-full rounded-t-lg" src="/storage/{{$post->thumbnail}}" >
                </div>
                @endif
            </a>
            <div class="p-5">
                <div class="contentProfile flex gap-x-2 items-center  mb-2">
                    @if (is_nulL($post->user->profile))
                    <div class="content-img">
                        <img src="/img/user.png" alt="" class="w-10">
                    </div>
                    @else
                    <div class="content-img">
                        <img src="/storage/{{ $post->user->profile }}" alt="" class="w-10">
                    </div>
                    @endif
                    <div class="content-report">
                        <a href="/profile/{{ $post->user->username }}"><p class="font-medium">{{ '@'.$post->user->username }}</p></a>
                    </div>
                </div>
                <a href="/posts/{{$post->slug}}">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$post->title}}</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$post->description}}</p>
                <hr class="my-2">
                @if ($post->expired_date == null)
                <p class="font-medium mb-2 rounded-xl p-2 w-max bg-green-200 text-sm text-green-700">Konten seumur hidup!</p>
                @else
                <p class="font-medium mb-2 rounded-xl p-2 w-max text-sm bg-blue-200 text-blue-700">expired : {{ \Carbon\Carbon::parse($post->expired_date)->diffForHumans() }}</p>
                @endif
                <a href="/posts/{{$post->slug}}" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    See detail!
                    <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
        </div>
        @endforeach
    </div>
    @if ($cantAdd)
    @else
    <div class="xl:w-3/5 lg:w-3/5 md:w-3/5 w-full mx-auto my-5">
        <button type="button" wire:click="addLimitPosts" class="block mx-auto text-4xl">
            <div class="icon-content flex items-center justify-center hover:bg-blue-300 hover:text-white transition w-full p-2 bg-blue-50 rounded-full">
                <img src="/img/plus.png" alt="" class="w-12">
            </div>
        </button>
    </div>
    @endif
</div>
