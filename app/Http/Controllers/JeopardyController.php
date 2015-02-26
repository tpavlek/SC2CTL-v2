<?php

namespace Depotwarehouse\SC2CTL\Web\Http\Controllers;

use View;

class JeopardyController extends Controller
{

    /**
     * Display the info about Jeopardy!
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return View::make('jeopardy.index');
    }
}
