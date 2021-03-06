<?php

namespace Depotwarehouse\SC2CTL\Web\Providers;

use Depotwarehouse\SC2CTL\Web\ViewComposers\ErrorPartialComposer;
use Depotwarehouse\SC2CTL\Web\ViewComposers\MeetupShowComposer;
use Depotwarehouse\SC2CTL\Web\ViewComposers\MeetupUserShowViewComposer;
use Depotwarehouse\SC2CTL\Web\ViewComposers\UserEditComposer;
use Depotwarehouse\SC2CTL\Web\ViewComposers\UserShowComposer;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{

    public function boot(Factory $view)
    {
        $view->composer('errors.errorPartial', ErrorPartialComposer::class);
        $view->composer('user.show', UserShowComposer::class);
        $view->composer('user.edit', UserEditComposer::class);
        $view->composer('meetup.show', MeetupShowComposer::class);
        $view->composer('meetup.user.show', MeetupUserShowViewComposer::class);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // TODO: Implement register() method.
    }
}
