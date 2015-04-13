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

    {!! Form::model($user->contact_record, [ 'route' => [ 'user.contact_record.update', $user->id ], 'method' => 'PUT', 'class' => 'pure-form pure-form-aligned' ]) !!}

        <legend>Edit contact information</legend>
        <p>
            If you like, you can add any number of contact fields to your user record. These will not be shared with
            anyone without your explicit permission. Doing so, allows you to use the site's networking facility to organize
            meetups with others at events.
        </p>

        <p>
            <strong>Remember:</strong> All fields are completely <em>optional</em>. Only input information you're comfortable
            with, or nothing at all!
        </p>

        <div class="pure-control-group">
            {!! Form::label('first_name') !!}
            {!! Form::text('first_name') !!}
        </div>

        <div class="pure-control-group">
            {!! Form::label('last_name') !!}
            {!! Form::text('last_name') !!}
        </div>

        <div class="pure-control-group">
            {!! Form::label('email', "Preferred Email:") !!}
            {!! Form::input('email', 'email') !!}
        </div>

        <div class="pure-control-group">
            {!! Form::label('skype') !!}
            {!! Form::text('skype') !!}
        </div>

        <div class="pure-control-group">
            {!! Form::label('twitter') !!}
            {!! Form::text('twitter') !!}
        </div>

        <div class="pure-control-group">
            {!! Form::label('cell_phone') !!}
            {!! Form::input('tel', 'cell_phone') !!}
        </div>

        <div class="pure-control-group">
            {!! Form::label('snapchat') !!}
            {!! Form::text('snapchat') !!}
        </div>

        <div class="pure-controls">
            <input type="submit" class="button success" value="Save" />
        </div>

    {!! Form::close() !!}
</div>
@stop
