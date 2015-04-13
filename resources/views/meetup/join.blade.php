@extends('meetup.layout')

@section('title')
Join {{ $meetup->name }}
@stop

@section('meetup_content')
<h1 class="section-header">Join {{ $meetup->name }}</h1>

    <div class="section">
        <p>
            By clicking join below, you are confirming your plans to attend this event. Others will expect you to show
            up and will request to meet you. They will be sorely disappointed if you do not show up after all.
        </p>

        {!! Form::open([ 'route' => [ 'meetup.attend', $meetup->name ], 'method' => 'POST', 'class' => 'pure-form' ]) !!}

            <input type="submit" class="button success" value="Confirm Attendance" />
            <a href="{{ URL::route('meetup.show', $meetup->name) }}" class="button cancel">Cancel</a>
        {!! Form::close() !!}
    </div>
@stop
