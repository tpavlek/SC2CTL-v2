@extends('layout')

@section('title')
    Jeopardy!
@stop

@section('content')
    <div class="jeopardy splash">
        <div class="content">
            <div class="buttons">
                <a href="mailto:jeopardy+questions@sc2ctl.com?subject=SC2CTL Jeopardy Question Contribution&body=Thank%20you%20for%20choosing%20to%20submit%20a%20question%20to%20SC2CTL%20Jeopardy!%20Creating%20questions%20can%20be%20very%20difficult%20and%20your%20contributions%20help%20us%20run%20a%20great%20show.%0A%0AYou%20do%20not%20need%20to%20fill%20out%20every%20field%20below%2C%20but%20do%20your%20best!%0A%0AQuestion%3A%0AAnswer%3A%0AEstimated%20Value%3A%0APotential%20Category%3A%0A%0A---%0AI%20acknowledge%20that%20by%20contributing%20this%20question%2C%20I%20am%20assigning%20copyright%20of%20this%20question%20to%20SC2CTL%20and%20grant%20them%20all%20exclusive%20rights%20to%20broadcast%20this%20question%20on%20the%20internet." class="button">
                    Submit a Question
                </a>
                <br />
                <a class="button" href="mailto:jeopardy+apply@sc2ctl.com?subject=I want to be on SC2CTL Jeopardy!&body=Thanks%20for%20your%20interest%20in%20being%20on%20SC2CTL%20Jeopardy!%0A%0APlease%20just%20tell%20us%20a%20bit%20about%20yourself%20and%20why%20you%20think%20you%20should%20be%20a%20contestant%20and%20we%20will%20get%20back%20to%20you.">
                    Apply to be a contestant
                </a>
            </div>
        </div>
    </div>

    <section class="jeopardy section">
        <p>
            Starting on March 3, 2015, SC2CTL has begun a new and unique initiative in the Starcraft II space, Game Shows!
            SC2CTL Jeopardy is a trivia game show that takes after the real Sony Pictures Jeopardy! hosted by Alex Trebek.
            Each show aims to unite members from across the community for a fun bout of competition about our favourite
            RTS.
        </p>

        <div>
            <p>
                In its operations SC2CTL Jeopardy takes a lot of inspiration from how the Team League was run: inclusiveness
                and fun above all else. To that end, we aim to unite the community in playing, not just give attention to those
                that already have it. Each show, as much as possible will play host to:
            </p>
            <ul>
                <li>One "pro" or competitive player</li>
                <li>One "community figure"</li>
                <li>One community member at large</li>
            </ul>
        </div>

    </section>

    <section class="jeopardy section">
        <h1>Next Show</h1>
        @if (isset($next_show))
            <h2>{{ $next_show->timezone(new DateTimeZone('America/Detroit'))->toDayDateTimeString() }} Eastern</h2>
            <h3>{{ $next_show->timezone(new DateTimeZone('America/Edmonton'))->toDayDateTimeString() }} Mountain</h3>
            <h3>{{ $next_show->timezone(new DateTimeZone('UTC'))->toDayDateTimeString() }} UTC</h3>
            <h3>{{ $next_show->timezone(new DateTimeZone('KST'))->toDayDateTimeString() }} KST</h3>
        @else
            <h2>TBD</h2>
        @endif

        @if (isset($next_show))
            @include('jeopardy.shows.4')
        @endif


    </section>

    <section class="jeopardy section">
        <h1>Previous Shows</h1>

        <a href="http://vods.sc2ctl.com" class="button massive inverted-button">SC2CTL VODs</a>
    </section>
@stop
