<?php namespace Depotwarehouse\SC2CTL\Web\Providers;

use App;
use Depotwarehouse\SC2CTL\Web\Events\ShareRequestEvent;
use Depotwarehouse\SC2CTL\Web\Handlers\Events\ShareRequestMailer;
use Depotwarehouse\SC2CTL\Web\Model\User\Eloquent\PasswordReminder;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider {

	/**
	 * The event handler mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
        ShareRequestEvent::class => [ ShareRequestMailer::class ]
	];

	/**
	 * Register any other events for your application.
	 *
	 * @param  \Illuminate\Contracts\Events\Dispatcher  $events
	 * @return void
	 */
	public function boot(DispatcherContract $events)
	{
		parent::boot($events);

        PasswordReminder::observe($this->app->make(\Depotwarehouse\SC2CTL\Web\Services\Mailers\PasswordReminder::class));

		//
	}

}
