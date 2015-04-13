@extends('meetup.layout')

@section('title')
    {{ $meetup->name }}
@stop

@section('meetup_content')

    <div class="section-header">
        {{ $meetup->name }}
    </div>
    <div class="section">
        <p>
            <strong>Important!</strong>
            <br />
            This is purely an informational and fan-based system. This does not represent the official guest list of the
            event, nor is it a conclusive promise that anyone listed here will definitely attend. All data is user-provided.
        </p>

        <h2>Attendees:</h2>
        @forelse($meetup->attendees as $attendee)
            <div class="attendee">
                <a href="#">{{ $attendee->username }}</a>
            </div>
        @empty
            <strong>No one has opted to attend yet!</strong>
        @endforelse
    </div>

@stop
