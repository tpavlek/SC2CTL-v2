<?php

Route::group([ 'namespace' => 'Auth' ], function() {
    Route::get('login', [ 'as' => 'user.login', 'uses' => 'AuthController@login' ]);
    Route::post('logout', [ 'as' => 'user.logout', 'uses' => 'AuthController@logout' ]);
    Route::post('auth', [ 'as' => 'user.auth', 'uses' => 'AuthController@auth' ]);

    Route::get('login/reset/begin', [ 'as' => 'reminder.start_reset', 'uses' => 'ReminderController@start_reset' ]);
    Route::post('login/reset/send_token', [ 'as' => 'reminder.send_token', 'uses' => 'ReminderController@send_token' ]);
    Route::get('login/reset/finalize_password/{token}', [ 'as' => 'reminder.finalize_password', 'uses' => 'ReminderController@finalize_password' ]);
    Route::post('login/reset/finalize_password', [ 'as' => 'reminder.complete_reset', 'uses' => 'ReminderController@complete_reset' ]);

    Route::get('bnet_connect', [ 'as' => 'bnet.connect', 'uses' => "BNetAuthController@bnet_connect" ]);
    Route::get('bnet_auth', [ 'as' => 'bnet.auth', 'uses' => "BNetAuthController@bnet_auth" ]);
    Route::get('bnet_disconnect', [ 'as' => 'bnet.disconnect', 'uses' => "BNetAuthController@bnet_disconnect" ]);
});

get('register', [ 'as' => 'user.register', 'uses' => 'UserController@register' ]);
post('register', [ 'as' => 'user.store', 'uses' => 'UserController@store' ]);

put('user/{user_id}/contact_record', [ 'as' => 'user.contact_record.update', 'uses' => 'ContactRecordController@update' ]);


/* // Meetups are disabled (it wasn't a great feature)
Route::group([ 'namespace' => 'Meetup' ], function() {
    get('meetup/help', [ 'as' => 'meetup.help', 'uses' => 'MeetupController@help' ]);
    get('meetup/{slug}', [ 'as' => 'meetup.show', 'uses' => 'MeetupController@show' ]);
    get('meetup/{slug}/join', [ 'as' => 'meetup.join', 'uses' => 'MeetupController@join' ]);
    post('meetup/{slug}/join', [ 'as' => 'meetup.attend', 'uses' => 'MeetupController@attend' ]);

    get('meetup/{slug}/leave', [ 'as' => 'meetup.leave', 'uses' => 'MeetupUserController@leave_event' ]);
    get('meetup/{meetup_slug}/attendee/{user_name}', [ 'as' => 'meetup.user.show', 'uses' => 'MeetupUserController@show' ]);
    post('meetup/{meetup_slug}/attendee/{user_name}/request', [ 'as' => 'meetup.share', 'uses' => 'MeetupUserController@share' ]);
    post('meetup/shares/{id}/accept', [ 'as' => 'meetup.share.accept', 'uses' => 'MeetupUserController@accept_share' ]);
});*/




Route::group( [ 'before' => 'auth' ], function () {



    /*Route::group([ 'before' => 'teamless_user|requires_bnet'], function() {
        Route::get('team/create', [ 'as' => 'team.create', "uses" => 'TeamController@create' ]);
        Route::post('team', [ 'as' => 'team.store', 'uses' => 'TeamController@store' ]);
    }); */ // TODO

    /*Route::group([ 'before' => 'team_permission:edit_team' ], function() {
        Route::get('/team/{id}/edit', [ 'as' => 'team.edit', "uses" => "TeamController@edit" ]);
        Route::post('team/{id}', [ 'as' => 'team.update', 'uses' => 'TeamController@update' ]);
    }); */ // TODO


    Route::group([ 'before' => 'is_user' ], function() {
        Route::get('user/{id}/edit', [ 'as' => 'user.edit', 'uses' => 'UserController@edit' ]);
        Route::put('user/{id}', [ 'as' => 'user.update', 'uses' => 'UserController@update' ]);
        Route::post('assets/user/{id}/upload_profile_img', [ 'as' => 'assets.user_profile_img', 'uses' => 'AssetController@uploadUserProfileImage' ]);
    });
});

Route::get('/', [ 'as' => 'home.index', "uses" => 'HomeController@index' ]);
Route::get('vod', function() { return Redirect::to('http://vods.sc2ctl.com'); });
Route::get('vods', function() { return Redirect::to('http://vods.sc2ctl.com'); });
Route::get('contact', [ 'as' => 'home.contact', "uses" => 'HomeController@contact' ]);
Route::get('about', [ 'as' => 'home.about', 'uses' => 'HomeController@about' ]);
Route::get('support_us', [ 'as' => 'home.support_us', 'uses' => 'HomeController@support' ]);
Route::get('sponsors', [ 'as' => 'home.sponsors', 'uses' => 'HomeController@sponsors' ]);
Route::get('help', [ 'as' => 'help', 'uses' => 'HomeController@help' ]);

Route::get('/jeopardy', [ 'as' => 'jeopardy', 'uses' => 'JeopardyController@index' ]);

Route::get('user/{id}', [ 'as' => 'user.show', 'uses' => 'UserController@show' ]);

/*
Route::get('team', [ 'as' => 'team.index', 'uses' => 'TeamController@index' ]);
Route::get('team/{id}', [ 'as' => 'team.show', 'uses' => 'TeamController@show' ]);
*/ // TODO

