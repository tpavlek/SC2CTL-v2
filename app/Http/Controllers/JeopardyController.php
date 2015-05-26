<?php

namespace Depotwarehouse\SC2CTL\Web\Http\Controllers;

use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Collection;
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
        // A list of upcoming shows that we add.
        $shows = new Collection([
            10 => new Carbon("June 2, 2015 7PM", new DateTimeZone('America/Edmonton')),
            11 => new Carbon("June 16, 2015 7PM", new DateTimeZone('America/Edmonton'))
        ]);

        // We only want to display shows that occur after the current time.
        $shows = $shows->filter(function(Carbon $show) {
            return Carbon::now(new DateTimeZone('America/Edmonton'))->lt($show);
        });

        return View::make('jeopardy.index')->with('shows', $shows);
    }
}
