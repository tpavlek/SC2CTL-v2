@extends('layout')

@section('title')
Help
@stop

@section('content')
<h2>SC2CTL Help</h2>
<p>
    Below you will find many links to videos outlining how to perform a task on SC2CTL.
    If you think another tutorial should be added or you find one that is outdated, please
    <a href="{{ URL::route('home.contact') }}">contact an adult</a>.
</p>

<ul>
    <li>
        <a href="http://blog.sc2ctl.com/post/80741397820/changes-to-team-structure-in-season-2">
            How do I register in a tournament?
        </a>
    </li>
    <li>
        <a href="https://www.youtube.com/watch?v=pwFG-FDDUPU">
            How to manage teams.
        </a>
    </li>
</ul>

@stop
