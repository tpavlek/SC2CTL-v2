@extends('layout')

@section('title')
Internal Server Error
@stop

@section('content')
<h1>Something went wrong!</h1>
<p>
    This incident has been logged. If this continues to occur, please
    <a href="{{ URL::route('home.contact') }}">
        contact an adult.
    </a>
</p>
@stop