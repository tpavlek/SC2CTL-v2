@extends('layout')

@section('title')
Help
@stop

@section('content')
<div class="section">
    <h1>SC2CTL Help</h1>
    <p>
        The current state of SC2CTL help is unfortunately in a bit of flux. Bear with us as we get our documentation together.
        In the meantime, feel free to <a href="{{ URL::route('home.contact') }}">contact an adult</a>
    </p>
</div>
    <div class="call-to-action">
        <h2 class="title">Panicking?</h2>
        <h2 class="call-to-action">Breathe deep, talk to an adult</h2>
        <a class="button massive" href="{{ URL::route('home.contact') }}">Contact an adult</a>
    </div>



@stop
