@extends('layout')

@section('title')
Reset your password
@stop

@section('content')
    <div class="section">

        {!! Form::open([ 'route' => 'reminder.send_token', 'class' => 'pure-form pure-form-aligned' ]) !!}

            <legend>Reset your password</legend>

            <p>
                Please note that it may take a couple of minutes to receive the email containing your password
                reset code.
            </p>

            <div class="pure-control-group">
              {!! Form::label('email') !!}
              {!! Form::text('email') !!}
            </div>

            <div class="pure-controls">
              <input type="submit" class="button success" value="Reset" />
              <a href="{{ URL::route('user.login') }}" class="button cancel">Cancel</a>
            </div>

        {!! Form::close() !!}
    </div>
@stop
