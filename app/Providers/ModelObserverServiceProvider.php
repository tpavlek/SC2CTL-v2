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
        \Log::error("here");
        Pivot::creating(function($test) {
            \Log::error("creating");
        });
        Pivot::created(function($model) {
            \Log::error($model);
        });
        \Event::listen('eloquent.created: '.ShareRequest::class, function($event) {
            \Log::error("Event fired!");
        });
        //ShareRequest::observe($this->app->make(ShareRequestObserver::class));
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
