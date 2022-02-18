<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    @if ($notification->type == 'follow')
    <h1 class="text-2xl w-full font-medium text-blue-500 shadow p-3">{{ '@'.$notification->user->username }} telah mengikuti anda!</h1>
    @elseif($notification->type == 'purchase_post')
    <h1 class="text-2xl w-full font-medium text-blue-500 shadow p-3">{{ '@'.$notification->user->username }} telah membeli postingan anda!</h1>
    @endif
    <div class="xl:w-3/5 lg:w-3/5 md:w-3/5 sm:w-3/5 w-11/12 mx-auto">
        @if ($notification->type == 'follow')
        <div class="w-full border flex justify-center items-center h-40 shadow">
            <a href="/profile/{{ $notification->user->username }}" class="mx-auto p-2 bg-blue-300 mt-0 text-white rounded font-medium">Lihat profile?</a>
        </div>
        @elseif($notification->type == 'purchase_post')
        <div class="w-full bg-white my-2 rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
            <a href="/posts/{{$notification->post->slug}}" class="block" >
                <div class="w-full border">
                    @if (is_null($notification->post->thumbnail))
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
                <a href="/posts/{{$notification->post->slug}}">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$notification->post->title}}</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$notification->post->description}}</p>
                <a href="/posts/{{$notification->post->slug}}" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    See detail!
                    <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
        </div>
        @endif
    </div>
</body>
</html>