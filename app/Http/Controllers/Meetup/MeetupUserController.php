<?php

namespace Depotwarehouse\SC2CTL\Web\Http\Controllers\Meetup;

use Depotwarehouse\SC2CTL\Web\Http\Controllers\Controller;
use Depotwarehouse\SC2CTL\Web\Model\Meetup\MeetupRepository;
use Depotwarehouse\SC2CTL\Web\Model\User\UserRepository;

class MeetupUserController extends Controller
{

    protected $userRepository;
    protected $meetupRepository;

    public function __construct(UserRepository $userRepository, MeetupRepository $meetupRepository)
    {
        $this->middleware('auth', [ 'except' => "show" ]);
        $this->userRepository = $userRepository;
        $this->meetupRepository = $meetupRepository;
    }

    public function show($meetup_slug, $user_name)
    {
        $meetup = $this->meetupRepository->findByName($meetup_slug);
        $user = $this->userRepository->findByUsername($user_name);

        $view = view('meetup.user.show')->with('user', $user)->with('meetup', $meetup);

        if (\Auth::check()) {
            $contact_shares_received = $user->contact_shares_received()->wherePivot('meetup_id', $meetup->id);
            if (\Auth::user()->username != $user_name) {
                $contact_share = $contact_shares_received->wherePivot('requester', \Auth::user()->id);
            }

            $contact_shares_received = $contact_shares_received->get()->map(function($req) {
                return $req->pivot;
            });

            $view->with('share_requests_received', $contact_shares_received);

            /*if ($contact_shares_received->first() != null) {
                $view->with('share_request', $contact_shares_received->first()->pivot);

            }*/
        }

        return $view;
    }

    public function share($meetup_slug, $user_name)
    {
        $contactstring = "snapchat,email";
        $meetup = $this->meetupRepository->findByName($meetup_slug);
        $user = $this->userRepository->findByUsername($user_name);

        \Auth::user()->contact_shares_requested()->attach($user->id, [ 'meetup_id' => $meetup->id, 'share_data' => $contactstring ]);
        return redirect()->route('meetup.user.show', [ $meetup_slug, $user_name ]);
    }

}
