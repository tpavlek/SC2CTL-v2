<?php

namespace Depotwarehouse\SC2CTL\Web\Http\Controllers\Meetup;

use Depotwarehouse\SC2CTL\Web\Http\Controllers\Controller;
use Depotwarehouse\SC2CTL\Web\Model\Meetup\MeetupRepository;
use Illuminate\Auth\Guard;
use Illuminate\Routing\Redirector;

class MeetupController extends Controller
{

    protected $meetupRepository;

    public function __construct(MeetupRepository $meetupRepository)
    {
        $this->meetupRepository = $meetupRepository;
        $this->middleware('auth', [ 'except' => "join" ]);
    }

    /**
     * Show the form to allow the user to join this event.
     *
     * @param $name
     * @return \Illuminate\View\View
     */
    public function join($name)
    {
        $meetup = $this->meetupRepository->findByName($name);

        return view('meetup.join')->with('meetup', $meetup);
    }

    public function attend($name, Guard $auth, Redirector $redirector)
    {
        $meetup = $this->meetupRepository->findByName($name);

        $meetup->attendees()->attach($auth->user()->id);

        return $redirector->route('meetup.show', $name);
    }

    public function show($name)
    {
        $meetup = $this->meetupRepository->findByName($name);

        return view('meetup.show')->with('meetup', $meetup);
    }
}
