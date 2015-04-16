@extends('meetup.layout')

@section('title')
{{ $user->username }} @ {{ $meetup->slug }}
@stop

@section('meetup_content')

    <h1 class="section-header">{{ $user->username }} @ {{ $meetup->slug }}</h1>
    <div class="section">
        @if (Auth::check())
            @if (Auth::user()->id == $user->id)
                <div style="border: 1px solid black; padding:1rem;">
                    <p>
                        <strong>That's you!</strong>
                    </p>
                    <ul>
                        @foreach ($user->getAllContactFields() as $field => $value)
                            <li><strong>{{ $field }}</strong>: {{ $value }}</li>
                        @endforeach
                    </ul>
                </div>

                <h3>Shares Received</h3>
                <ul>
                    @forelse($share_requests_received as $share_request)
                        <li>
                            <strong>{{ $share_request->get_requester->username }}</strong>:
                            @if($share_request->accepted)
                                <a href="{{ URL::route('meetup.user.show', [ $share_request->meetup->slug, $share_request->get_requester->username ]) }}" class="button small">
                                    View Info
                                </a>
                            @else
                                {!! Form::open([ 'route' => [ 'meetup.share.accept', $share_request->id ], 'class' => 'pure-form pure-form-aligned inline-form' ]) !!}
                                    <input type="submit" value="Accept" class="button small success">
                                {!! Form::close() !!}
                            @endif
                        </li>
                    @empty
                        <li><em>No share requests at this time!</em></li>
                    @endforelse
                </ul>
            @else
                @if ($share_requests_received->count())
                    <p>
                        <strong>Share Request Status: </strong> {{ ($share_requests_received->first()->accepted) ? 'Accepted' : 'Pending' }}!
                    </p>
                @else
                    <button class="button success show-share-form">Share Data</button>
                    {!! Form::open([ 'route' => [ 'meetup.share', $meetup->slug, $user->username ], 'method' => 'POST', 'class' => 'pure-form share-form', 'style' => "display:none; border: 1px solid black; padding: 1rem;"]) !!}
                        @foreach(Auth::user()->getAllAvailableContactFields() as $contact_field)
                                <label for="contact_fields[]" class="pure-checkbox">
                                    <input type="checkbox" name="contact_fields[]" value="{{ $contact_field }}" />
                                    {{ $contact_field }}
                                </label>

                        @endforeach
                        <input type="submit" value="Submit" class="button small" />

                    {!! Form::close() !!}
                @endif

                @if($share_requests_requested->count())
                    <div style="border: 1px solid black; padding: 1rem;">
                        <ul>
                            @forelse ($share_requests_requested->first()->getShareData() as $field => $value)
                                <li><strong>{{ $field }}</strong>: {{ $value }}</li>
                            @empty
                                <li><em>This user has opted not to share any data with you!</em></li>
                            @endforelse
                        </ul>
                    </div>
                @endif
            @endif
        @endif
        <p>
            {{ $user->username }} has indicated that he/she will be attending {{ $meetup->name }}!
        </p>
    </div>

    <script>
        $(document).ready(function() {
            $('.show-share-form').click(function() {
                var button = this;
                $('.share-form').show('fast', function() {
                    $(button).hide('fast');
                });
            });
        })
    </script>
@stop
