@extends('user.layouts.app')
@section('content')
    @foreach ($tags as $tag)
        <p><a href="/tags/{{$tag->slug}}">{{$tag->name}}</a></p>
    @endforeach
@endsection
