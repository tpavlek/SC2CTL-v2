<?php

namespace Depotwarehouse\SC2CTL\Web\ViewComposers;

use Depotwarehouse\SC2CTL\Web\Permissions\IsUser;
use Depotwarehouse\SC2CTL\Web\ViewComposers\Composer;
use Illuminate\View\View;
use URL;

class UserShowComposer extends Composer
{

    use IsUser;

    /**
     * Handles the content of the view and composes any required data.
     *
     * @param \Illuminate\View\View $view
     * @return mixed
     */
    function compose(View $view)
    {
        $page_actions = [ ];

        if ($this->isUser($view['user'])) {
            $page_actions[] = [
                'name' => 'Edit Profile',
                'url' => URL::route('user.edit', $view['user']->id)
            ];
        }

        if (count($page_actions) > 0) {
            $view->with('page_actions', $page_actions);
        }
    }
}
