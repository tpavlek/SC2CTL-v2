@extends('layout')

@section('title')
Sponsors
@stop

@section('content')
    <div class="section">
        <div class="pure-g">
            @include('sponsors.patreon')
        </div>
    </div>

    <div class="call-to-action">
        <h2 class="title">Interested in sponsoring SC2 events?</h2>
        <h2 class="call-to-action">Sponsor SC2CTL</h2>
        <a href="{{ URL::route('home.contact') }}" class="button massive">Contact us</a>
    </div>
@stop
