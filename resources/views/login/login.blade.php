@extends('layout')

@section('title')
Login
@stop

@section('content')
<div class="section">
    <strong>Important!</strong>
    <p>
        If there are problems, or you have forgotten your email that you registered with,
        then you can <a href="{{ URL::route('home.contact') }}">Contact Us</a> and we'll get you sorted.
    </p>

    {{ Form::open([ 'route' => 'user.auth', 'method' => 'POST', 'class' => "pure-form pure-form-aligned" ]) }}
        <div class="pure-control-group">
            {{ Form::label('email') }}
            {{ Form::text('email') }}
        </div>

        <div class="pure-control-group">
            {{ Form::label('password') }}
            {{ Form::password('password') }}
        </div>

        <div class="pure-controls">
            <input type="submit" value="Log in" class="button success" />
            <a href="{{ URL::route('reminder.start_reset') }}" class="button cancel">
                Reset Password
            </a>
        </div>
    {{ Form::close() }}
    <br />
</div>

<div class="call-to-action">
    <h2 class="title">No Account?</h2>
    <a href="{{ URL::route('user.register') }}" class="button massive">
        Register here
    </a>
</div>


@stop
