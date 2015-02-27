@extends('layout')

@section('title')
Choose your new password
@stop

@section('content')
    <div class="section">
        {!! Form::open([ 'route' => 'reminder.complete_reset', 'class' => 'pure-form pure-form-aligned' ]) !!}
            <legend>Enter new Password</legend>
            {!! Form::hidden('token', $token) !!}

            <div class="pure-control-group">
                {!! Form::label('password', "New Password") !!}
                {!! Form::password('password') !!}
            </div>

            <div class="pure-control-group">
                {!! Form::label('password_confirmation', "Confirm") !!}
                {!! Form::password('password_confirmation') !!}
            </div>

            <div class="pure-controls">
                <input type="submit" class="button success" />
                <a href="{{ URL::route('user.login') }}" class="button cancel">Cancel</a>
            </div>
        {!! Form::close() !!}
    </div>
@stop
