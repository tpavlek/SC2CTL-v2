<?php

namespace Depotwarehouse\SC2CTL\Web\Http\Controllers\Auth;

use Depotwarehouse\SC2CTL\Web\Http\Controllers\Controller;

class AuthController extends Controller
{

    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function login()
    {
        return View::make('login.login');
    }


    /**
     * Authenticates a user.
     *
     * @return Redirect
     */
    public function auth()
    {
        $credentials = Input::only([
            'email',
            'password'
        ]);

        if (!Auth::attempt($credentials)) {
            return Redirect::route('user.login')
                ->withErrors(new MessageBag([
                    'errors' => "There was an error authenticating. Please check your email and password."
                ]));
        }

        return Redirect::route('user.show', Auth::user()->id);
    }

    /**
     * Logs out a user
     *
     * @return Redirect
     */
    public function logout()
    {
        Auth::logout();
        return Redirect::route('home.index');
    }

    /**
     * Displays the register form.
     *
     * @return \Illuminate\View\View
     */
    public function register()
    {
        return View::make('login.register');
    }

}
