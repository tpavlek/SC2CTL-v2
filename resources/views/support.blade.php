@extends('layout')

@section('title')
    Support Us
@stop

@section('content')
    <div class="section">
        <h1>Support SC2CTL</h1>
        <p>
            There are many ways to help support us. The foremost is referrals, if you use any of the below services,
            please use our referral link. You'll get a bonus and so will we.
        </p>

        <hr />

        <div class="referral">
            <h2>Contribute Via Paypal</h2>
            <p>
                The easiest way to support us is to just pitch in a couple bucks and help us do new and adventurous things.
            </p>
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                <input type="hidden" name="cmd" value="_s-xclick">
                <input type="hidden" name="hosted_button_id" value="3GPAA26B868NQ">
                <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
            </form>
        </div>

        <hr />

        <div class="referral">
            <h2>PATREON</h2>
            <p>
                We have a Patreon page that allows you to commit to paying for each episode of Starcraft Jeopardy as it
                is released. That way you only pay when you're getting high-quality content in return, but it allows us
                to more accurately assess cashflow so we can try new and interesting projects.
            </p>

            <a href="https://patreon.com/sc2ctl" class="button">Become a Patron</a>
        </div>

        <hr />

        <div class="referral">
            <h2>Digital Ocean</h2>
            <p>
                Digital Ocean is a cloud hosting platform. All SC2CTL properties are hosted on Digital Ocean - not only are
                they extremely configurable, but also extremely affordable, with a VPS starting at $5 monthly.
            </p>
            <p>
                Sign up with the button below and get <strong>$10</strong> in service credits.
            </p>
            <a href="https://www.digitalocean.com/?refcode=a3368df2f05f" class="button">Sign up</a>
        </div>

        <hr />

        <div class="referral">
            <h2>Tangerine Bank</h2>
            <p>
                If you're a Canadian, you can switch to Tangerine Bank. They offer a whole host of features along with
                no fees and easy online banking. Sign up with us and earn <strong>$50 cash</strong> after you deposit $100.
            </p>

            <em>Make sure to use the Orange Key: <strong>41703403S1</strong></em>.
            <br />
            <a href="http://www.tangerine.ca/en/referafriend/index.html" class="button">More info & Sign Up</a>
        </div>
    </div>


    <div class="call-to-action">
        <h2 class="title">Want more information or have a different idea?</h2>
        <h2 class="call-to-action">Send us a message</h2>
        <a href="{{ URL::route('home.contact') }}" class="button massive">Contact us</a>
    </div>
@stop
