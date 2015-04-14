<?php

namespace Depotwarehouse\SC2CTL\Web\ViewComposers;

use Depotwarehouse\Toolbox\FrameworkIntegration\Laravel\ViewComposers\Composer;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\View\View;
use Illuminate\Support\MessageBag;

class MeetupUserShowViewComposer extends Composer
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
        if (!$this->auth->check()) {
            /** @var \Illuminate\Support\MessageBag $errorBag */
            $errorBag = isset($view['errors']) ? $view['errors'] : new MessageBag();

            $errorBag->add('warn', "Please login/register in order to share contact information with this user");
            $view->with('errors', $errorBag);
        }
    }
}
