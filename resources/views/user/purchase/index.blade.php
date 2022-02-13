@extends('user.layouts.app')
@section('content')
    <form action="/posts/{{$post->slug}}/purchase/" method="post">
        <input type="text" value="{{$post->title}}">
    </form>
@endsection
