@extends('user.layouts.app')
@section('content')
    @foreach ($subscribes as $c)
        <p>{{$c->creator->user->name}}</p>
    @endforeach
@endsection
