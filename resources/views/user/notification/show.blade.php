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
    @endif
    <div class="xl:w-3/5 lg:w-3/5 md:w-3/5 sm:w-3/5 w-11/12 mx-auto">
        @if ($notification->type == 'follow')
        <div class="w-full border flex justify-center items-center h-40 shadow">
                <a href="/profile/{{ $notification->user->username }}" class="mx-auto p-2 bg-blue-300 mt-0 text-white rounded font-medium">Lihat profile?</a>
            </div>
            @endif
    </div>
</body>
</html>