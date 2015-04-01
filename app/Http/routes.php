<?php

Route::group([ 'namespace' => 'Auth' ], function() {
    Route::get('login', [ 'as' => 'user.login', 'uses' => 'AuthController@login' ]);
    Route::post('logout', [ 'as' => 'user.logout', 'uses' => 'AuthController@logout' ]);
    Route::post('auth', [ 'as' => 'user.auth', 'uses' => 'AuthController@auth' ]);
    Route::get('register', [ 'as' => 'user.register', 'uses' => 'AuthController@register' ]);
    Route::get('login/reset/begin', [ 'as' => 'reminder.start_reset', 'uses' => 'ReminderController@start_reset' ]);
    Route::post('login/reset/send_token', [ 'as' => 'reminder.send_token', 'uses' => 'ReminderController@send_token' ]);
    Route::get('login/reset/finalize_password/{token}', [ 'as' => 'reminder.finalize_password', 'uses' => 'ReminderController@finalize_password' ]);
    Route::post('login/reset/finalize_password', [ 'as' => 'reminder.complete_reset', 'uses' => 'ReminderController@complete_reset' ]);

    Route::get('bnet_connect', [ 'as' => 'bnet.connect', 'uses' => "BNetAuthController@bnet_connect" ]);
    Route::get('bnet_auth', [ 'as' => 'bnet.auth', 'uses' => "BNetAuthController@bnet_auth" ]);
    Route::get('bnet_disconnect', [ 'as' => 'bnet.disconnect', 'uses' => "BNetAuthController@bnet_disconnect" ]);
});



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

