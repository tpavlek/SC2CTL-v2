<?php

namespace Depotwarehouse\SC2CTL\Web\Providers;

use Depotwarehouse\SC2CTL\Web\Model\ShareRequest;
use Depotwarehouse\SC2CTL\Web\Model\ShareRequestObserver;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\ServiceProvider;

class ModelObserverServiceProvider extends ServiceProvider
{


    public function boot()
    {
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
