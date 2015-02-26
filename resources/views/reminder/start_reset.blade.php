@extends('layout')

@section('title')
Reset your password
@stop

@section('content')
    <p>
        Please note that it may take a couple of minutes to receive the email containing your password
        reset code.
    </p>
    {{ Form::open([ 'route' => 'reminder.send_token', 'class' => 'pure-form pure-form-aligned' ]) }}

        <div class="pure-control-group">
          {{ Form::label('email') }}
          {{ Form::text('email') }}
        </div>

        <div class="pure-controls">
          <input type="submit" class="pure-button pure-button-good" value="Reset" />
          <a href="{{ URL::route('user.login') }}" class="pure-button pure-button-cancel">Cancel</a>
        </div>

    {{ Form::close() }}
@stop
