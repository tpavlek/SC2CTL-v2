@extends('layout')

@section('content')

    <nav class="meetup-nav">
        <ul>
            @if (Auth::check() && $meetup->isAttending(Auth::user()))
                <li>
                    <a href="{{ URL::route('meetup.user.show', [ $meetup->slug, Auth::user()->username ]) }}">Me</a>
                </li>
                <li>
                    <a href="{{ URL::route('meetup.show', $meetup->slug) }}">All Attendees</a>
                </li>
            @endif
            <li><a href="{{ URL::route('meetup.help') }}">Help</a></li>
        </ul>
    </nav>

    @yield('meetup_content')
@stop
