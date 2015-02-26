@extends('layout')

@section('title')
Edit Profile
@stop

@section('content')
<div class="section">
    {!! Form::model($user, [ 'route' => [ 'user.update', $user->id ], 'method' => 'PUT', 'class' => "pure-form pure-form-aligned" ]) !!}

        <legend>Edit Profile</legend>

        <div class="pure-control-group">
            {!! Form::label('email') !!}
            {!! Form::input('email', 'email') !!}
        </div>

        <div class="pure-control-group">
            {!! Form::label('username') !!}
            {!! Form::text('username') !!}
        </div>

        <div class="pure-controls">
          {!! Form::submit('Update', [ 'class' => 'button success' ]) !!}
        </div>

    {!! Form::close() !!}

    {!! Form::open([ 'route' => [ 'assets.user_profile_img', $user->id ], 'method' => "POST", 'class' => "pure-form pure-form-aligned", 'files' => true ]) !!}

        <legend>Upload Profile Picture</legend>

        <div class="pure-control-group">
            {!! Form::label('img', 'Image') !!}
            {!! Form::file('img') !!}
        </div>

        <div class="pure-controls">
            <input type="submit" class="button" value="Upload" />
        </div>
    {!! Form::close() !!}
</div>
@stop
