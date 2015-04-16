<?php

namespace Depotwarehouse\SC2CTL\Web\ViewComposers;

use Depotwarehouse\SC2CTL\Web\Model\Meetup\Meetup;
use Depotwarehouse\Toolbox\FrameworkIntegration\Laravel\ViewComposers\Composer;
use Illuminate\Auth\Guard;
use Illuminate\Contracts\View\View;
use URL;

class MeetupShowComposer extends Composer
{

    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handles the content of the view and composes any required data.
     *
     * @param View $view
     * @return mixed
     */
    function compose(View $view)
    {

        $page_actions = [];

        /** @var Meetup $meetup */
        $meetup = $view['meetup'];

        if ($this->auth->check()) {
            if ($meetup->isAttending($this->auth->user())) {
                $page_actions[] = [
                    'name' => "Leave Event (delete all shares)",
                    'url' => URL::route('meetup.leave', $meetup->slug)
                ];
            } else {
                $page_actions[] = [
                    'name' => 'Join Event',
                    'url' => URL::route('meetup.join', $meetup->name)
                ];
            }
        }

        if (count($page_actions) > 0) {
            $view->with('page_actions', $page_actions);
        }
    }
}
