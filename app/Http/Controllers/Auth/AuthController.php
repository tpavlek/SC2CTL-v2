<?php

namespace Depotwarehouse\SC2CTL\Web\Http\Controllers\Auth;

use Depotwarehouse\SC2CTL\Web\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\MessageBag;
use Input;
use Redirect;
use View;

class AuthController extends Controller
{

    /**
     * Our instance of authentication provider.
     *
     * @var \Illuminate\Contracts\Auth\Guard
     */
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('guest', [ 'except' => 'logout' ]);
    }
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function auth()
    {
        $credentials = Input::only([
            'email',
            'password'
        ]);

        if (! $this->auth->attempt($credentials)) {
            return Redirect::route('user.login')
                ->withErrors(new MessageBag([
                    'errors' => "There was an error authenticating. Please check your email and password."
                ]));
        }

        return Redirect::route('user.show', $this->auth->user()->id);
    }

    /**
     * Logs out a user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        $this->auth->logout();
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
