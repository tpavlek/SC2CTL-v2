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
        $next_show = new Carbon("March 17, 2015 7PM", new DateTimeZone('America/Edmonton'));
        return View::make('jeopardy.index')
            ->with('next_show', $next_show);
    }
}
