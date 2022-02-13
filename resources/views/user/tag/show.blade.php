@extends('user.layouts.app')
@section('content')
    @foreach ($posts as $post)
        <p>{{$post->post->title}}</p>
    @endforeach
@endsection
