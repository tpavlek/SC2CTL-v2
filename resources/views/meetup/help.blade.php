@extends('meetup.layout')

@section('title')
Meetup Help
@stop

@section('meetup_content')
    <h1 class="section-header">Help with the meetup tool</h1>
    <div class="section">
        <p>
            This tool has a couple features: "Profiles" which you can fill out with your common contact details like
            email, twitter, skype and even cell phone no. and then a list of attendees who have committed to attending the
            conference. You can then share any number of your profile fields with these users so you have both a list of
            people you would like to meet in Toronto, as well as some contact information to facilitate doing so!
        </p>
        <p>
            The meetup tool is fairly straightforward and simple, but this document will help guide your use of it.
        </p>

        <h2>Usage steps</h2>
        <ol>
            <li>Register an account if you don't have one or login on <a href="{{ URL::route('user.login') }}">the login page</a>.</li>
            <li>In the navigation menu on the left, click your username to go to your profile page.</li>
            <li>In the navigation menu on the left, click "Edit Profile" under "Page Actions" and fill in any contact information you wish to share.</li>
            <li>In the navigation menu click "TORONTO".</li>
            <li>If you are attending, click "Join Event" (you must be logged in for this) and confirm your attendance.</li>
            <li>
                You can click any user in the attendees list, to be brought to their page. If they have shared data with you, you will see their
                information. You can also click the "Share Data" button to share your data with them. Check off each field that you
                would like them to be able to see.
            </li>
            <li>
                Your share request status will become "Pending". When it becomes "Accepted" you'll know that they have received and
                accepted your request.
            </li>
            <li>
                In order to view who has shared their data with you click "Me" in top orange navigation bar. You will see a list
                of Shares that you have received. To accept any of them, simply click accept. Once you have accepted, you will
                see a "View Info" button that will take you to that user's page and show you the information they have chosen to share.
            </li>

        </ol>
    </div>

@stop
