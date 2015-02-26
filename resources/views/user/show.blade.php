@extends('layout')

@section('title')
{{ $user->username }}'s Profile
@stop

@section('content')
@if (Auth::check() && Auth::user()->id == $user->id && Auth::user()->hasActiveNotifications())
<div class="call-to-action">
    <h2 class="title">Notifications (1)</h2>
    <a href="#" class="button large">View Notifications</a>
</div>
@endif
<div class="pure-g multi-panel">
    <div class="pure-u-1 pure-u-md-1-4 user-profile panel">
        <div class="content">
            <h3>{{ $user->username }}</h3>
            <p>
                <strong>Registered: </strong> {{ $user->created_at->toDateString() }}
            </p>
        </div>
        <div class="img-wrapper">
            <img src="{{ $user->profile_img }}" />
        </div>
    </div>
    <div class="pure-u-1 pure-u-md-3-4 bnet-info panel">
        <div class="content">
            @if ($user->hasConnectedBattleNet())
                <img class="league-img" src="{{ $user->bnet->league_img }}" />
                <div class="info">
                    <h3>{{ $user->bnet->qualified_name }}</h3>
                    <strong>Race:</strong> {{ $user->bnet->race }}
                    <br />
                    <strong>Season Wins:</strong> {{ $user->bnet->season_wins }} (as {{ $user->bnet->race }})
                    <br />
                    <strong>Season Losses:</strong> {{ $user->bnet->season_losses }}
                </div>

                <a href="{{ $user->bnet->profile_url }}" class="button">
                    Battle.net Profile
                </a>
                <p class="note">
                    <strong>Note:</strong> this information is updated periodically, and may be slightly out of date.
                </p>

            @else
                No bnet information available
            @endif
        </div>

    </div>
</div>


@stop
