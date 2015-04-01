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
        $next_show = new Carbon("April 7, 2015 7PM", new DateTimeZone('America/Edmonton'));

        // If we've passed the next show date, we don't want to include it in the view.
        if (Carbon::now(new DateTimeZone('America/Edmonton'))->lt($next_show)) {
            return View::make('jeopardy.index')
                ->with('next_show', $next_show);
        }

        return View::make('jeopardy.index');

    }
}
