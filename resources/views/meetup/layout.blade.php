@extends('layout')

@section('content')
    @if (Auth::check() && $meetup->isAttending(Auth::user()))
    <nav class="meetup-nav">
        <ul>
            <li>
                <a href="{{ URL::route('meetup.user.show', [ $meetup->slug, Auth::user()->username ]) }}">Me</a>
            </li>
            <li>
                <a href="{{ URL::route('meetup.show', $meetup->slug) }}">All Attendees</a>
            </li>
        </ul>
    </nav>
    @endif
    @yield('meetup_content')
@stop
