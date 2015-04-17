<?php

namespace Depotwarehouse\SC2CTL\Web\Http\Controllers\Meetup;

use Depotwarehouse\SC2CTL\Web\Events\ShareRequestEvent;
use Depotwarehouse\SC2CTL\Web\Http\Controllers\Controller;
use Depotwarehouse\SC2CTL\Web\Model\Meetup\MeetupRepository;
use Depotwarehouse\SC2CTL\Web\Model\ShareRequest;
use Depotwarehouse\SC2CTL\Web\Model\User\Eloquent\User;
use Depotwarehouse\SC2CTL\Web\Model\User\UserRepository;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

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
            $contact_shares_requested = $user->contact_shares_requested()->wherePivot('meetup_id', $meetup->id);

            // If it is not the user who owns this page viewing the page, we only want to show the requests from the current
            // logged in user to the displayed user.
            if (\Auth::user()->username != $user_name) {
                $contact_shares_received = $contact_shares_received->wherePivot('requester', \Auth::user()->id);
                $contact_shares_requested = $contact_shares_requested->wherePivot('requestee', \Auth::user()->id);
            }

            $contact_shares_received = $contact_shares_received->get()->map(function($req) {
                return $req->pivot;
            });
            $contact_shares_requested = $contact_shares_requested->get()->map(function($req) {
                return $req->pivot;
            });

            $view->with('share_requests_received', $contact_shares_received);
            $view->with('share_requests_requested', $contact_shares_requested);
        }

        return $view;
    }

    public function share($meetup_slug, $user_name, Request $input)
    {
        $contactstring = implode(",", $input->get('contact_fields', []));
        $meetup = $this->meetupRepository->findByName($meetup_slug);
        $user = $this->userRepository->findByUsername($user_name);

        \Auth::user()->contact_shares_requested()->attach($user->id, [ 'meetup_id' => $meetup->id, 'share_data' => $contactstring ]);
        $model = \Auth::user()->contact_shares_requested()->where('requestee', $user->id)->wherePivot('meetup_id', $meetup->id)->first()->pivot;
        event(new ShareRequestEvent($model));
        return redirect()->route('meetup.user.show', [ $meetup_slug, $user_name ]);
    }

    public function accept_share($id)
    {
        /** @var ShareRequest $request */
        $request = \Auth::user()->contact_shares_received()->wherePivot('id', $id)->firstOrFail()->pivot;

        $request->accepted = true;
        $request->save();
        return redirect()->route('meetup.user.show', [ $request->meetup->slug, $request->get_requestee->username ]);
    }

    public function leave_event($meetup_slug, Guard $auth)
    {
        /** @var User $user */
        $user = $auth->user();
        $user->contact_shares_requested()->sync([]);
        $user->contact_shares_received()->sync([]);
        $user->meetups()->where('slug', $meetup_slug)->first()->pivot->delete();

        return redirect()->route('meetup.show', $meetup_slug);
    }

}
