<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <livewire:styles/>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <link rel="stylesheet" type="text/css" href="/css/rightext.css">
    <script type="text/javascript" src="/js/trix.js"></script> --}}
    <link rel="stylesheet" href="/css/trix.css">
    <script src="/js/trix.js"></script>
    <script src="/js/trix-core.js"></script>
    @yield('head')
</head>
<body>
    @include('user.partials.header')
    @yield('content')
    @include('user.partials.footer')
    <script src="https://unpkg.com/@themesberg/flowbite@1.3.0/dist/flowbite.bundle.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    {{-- <script type="text/javascript" src="/js/rightext.js"></script> --}}
    <livewire:scripts/>
</body>
</html>
