@extends('...layout')

@section('title')
Register
@stop

@section('content')
    <div class="section">
        {{ Form::open([ 'route' => 'user.store', 'method' => 'POST', 'class' => 'pure-form pure-form-aligned' ]) }}

        <legend>Step 1</legend>
        <section id="register_information">
            <p>First, let's some identifying information for you</p>

            <div class="pure-control-group">
                {{ Form::label('email') }}
                {{ Form::text('email') }}
            </div>
            <div class="pure-control-group">
                {{ Form::label('username') }}
                {{ Form::text('username') }}
            </div>

        </section>

        <legend>Step 2</legend>
        <section id="register_password">
            <p>
                Choose a password that you'll use to login. We don't enforce any rules about password security, but
                don't be stupid
            </p>
            <div class="pure-control-group">
                {{ Form::label('password') }}
                {{ Form::password('password', [ 'class' => 'validates val-matches validated' ]) }}
                <span class="feedback"></span>
            </div>

            <div class="pure-control-group">
                {{ Form::label('confirmation') }}
                {{ Form::password('password_confirmation', [ 'class' => 'validates val-matches' ]) }}
                <span class="feedback"></span>
            </div>
        </section>


        <div class="pure-controls">
            {{ Form::submit('Register', [ 'class' => 'button success' ]) }}
            <a href="{{ URL::route('home.index') }}" class="button cancel">Cancel</a>
        </div>

        {{ Form::close() }}
    </div>
@stop
