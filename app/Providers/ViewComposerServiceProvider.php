<?php

namespace Depotwarehouse\SC2CTL\Web\Providers;

use Depotwarehouse\SC2CTL\Web\ViewComposers\ErrorPartialComposer;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{

    public function boot(Factory $view)
    {
        $view->composer('errors.errorPartial', ErrorPartialComposer::class);
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
