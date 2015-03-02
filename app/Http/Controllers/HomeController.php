<?php

namespace Depotwarehouse\SC2CTL\Web\Http\Controllers;

use Redirect;
use View;

class HomeController extends Controller
{


    /**
     * Show the application dashboard to the user.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        return Redirect::route('home.about');
        //return View::make('index');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function about()
    {
        return View::make('about');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function contact()
    {
        return View::make('contact');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function format()
    {
        return View::make('format');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function rules()
    {
        return View::make('rules');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function help()
    {
        return View::make('help');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function sponsors() {
        return View::make('sponsors');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function support()
    {
        return View::make('support');
    }

}
