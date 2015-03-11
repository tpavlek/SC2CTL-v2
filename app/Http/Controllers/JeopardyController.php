<?php

namespace Depotwarehouse\SC2CTL\Web\Http\Controllers;

use Carbon\Carbon;
use DateTime;
use DateTimeZone;
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
        $next_show = new Carbon("March 10, 2015 9PM", new DateTimeZone('EST'));
        return View::make('jeopardy.index')
            ->with('next_show', $next_show);
    }
}
