<?php

namespace Depotwarehouse\SC2CTL\Web\Http\Controllers\Meetup;

use Depotwarehouse\SC2CTL\Web\Http\Controllers\Controller;
use Depotwarehouse\SC2CTL\Web\Model\Meetup\MeetupRepository;
use Illuminate\Auth\Guard;
use Illuminate\Contracts\View\Factory;
use Illuminate\Routing\Redirector;

class MeetupController extends Controller
{

    protected $meetupRepository;

    public function __construct(MeetupRepository $meetupRepository)
    {
        $this->meetupRepository = $meetupRepository;
        $this->middleware('auth', [ 'except' => [ "show", "help" ] ]);
    }

    public function help(Factory $view)
    {
        return $view->make('meetup.help')->with('meetup', $this->meetupRepository->findByName('toronto'));
    }

    /**
     * Show the form to allow the user to join this event.
     *
     * @param $name
     * @return \Illuminate\View\View
     */
    public function join($slug)
    {
        $meetup = $this->meetupRepository->findByName($slug);

        return view('meetup.join')->with('meetup', $meetup);
    }

    public function attend($slug, Guard $auth, Redirector $redirector)
    {
        $meetup = $this->meetupRepository->findByName($slug);

        $meetup->attendees()->attach($auth->user()->id);

        return $redirector->route('meetup.show', $slug);
    }

    public function show($slug)
    {
        $meetup = $this->meetupRepository->findByName($slug);

        return view('meetup.show')->with('meetup', $meetup);
    }
}
