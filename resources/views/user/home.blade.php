@extends('user.layouts.app')

@section('content')
<div class="xl:w-3/5 lg:w-3/5 md:w-3/5 w-full border mx-auto p-5 rounded shadow my-3">
    <h1 class="text-2xl mb-2 font-medium">Home</h1>
    <hr class="my-2">
    {{-- @if (auth()->user()->hasRole('creator'))
        <h1 class="text-2xl font-medium">Halo creator</h1>
        <img src="/img/welcome.png" alt="" class="w-2/4 mx-auto">
    @else
        <h1 class="text-2xl font-medium">Halo User</h1>
        <img src="/img/welcome.png" alt="" class="w-2/4 mx-auto">
        <a href="/posts" class="text-gray-500 font-medium hover:text-blue-600">Cari postingan? Klik disini!</a>
    @endif --}}
</div>
@endsection
