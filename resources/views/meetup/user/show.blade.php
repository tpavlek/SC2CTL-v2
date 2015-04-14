@extends('meetup.layout')

@section('title')
{{ $user->username }} @ {{ $meetup->slug }}
@stop

@section('meetup_content')

    <h1 class="section-header">{{ $user->username }} @ {{ $meetup->slug }}</h1>
    <div class="section">
        @if (Auth::check())
            @if (Auth::user()->id == $user->id)
                <p>
                    <strong>That's you!</strong>
                </p>
                <ul>
                    @foreach ($user->getAllContactFields() as $field => $value)
                        <li><strong>{{ $field }}</strong>: {{ $value }}</li>
                    @endforeach
                </ul>

                <h3>Share Requests Received</h3>
                <ul>
                    @forelse($share_requests_received as $share_request)
                        <li>
                            <strong>{{ $share_request->get_requestee->username }}</strong>:
                            {{ ($share_request->approved) ? 'Approved' : 'Pending' }}
                        </li>
                    @empty
                        <li><em>No share requests at this time!</em></li>
                    @endforelse
                </ul>
            @else
                @if (isset($share_request))
                    <p>
                        <strong>Share Request Status: </strong> {{ ($share_request->approved) ? 'Approved' : 'Pending' }}!
                    </p>
                @else
                    {!! Form::open([ 'route' => [ 'meetup.share', $meetup->slug, $user->username ], 'method' => 'POST' ]) !!}
                    <input type="submit" value="Request Share" class="button success" />
                    {!! Form::close() !!}
                @endif
            @endif
        @endif
        <p>
            {{ $user->username }} has indicated that he/she will be attending {{ $meetup->name }}!
        </p>
    </div>
@stop
