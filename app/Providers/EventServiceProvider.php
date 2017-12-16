<?php

namespace Battleroad\Providers;

use Champ\Championship\Events\CouponWasApplied;
use Champ\Join\Events\JoinCancelled;
use Champ\Join\Events\UserJoined;
use Champ\Listeners\ChampionshipVacancyUpdater;
use Champ\Listeners\CompetitionVacancyUpdater;
use Champ\Listeners\JoinDiscountListener;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        CouponWasApplied::class => [
            JoinDiscountListener::class,
        ],
        UserJoined::class => [
            ChampionshipVacancyUpdater::class,
            CompetitionVacancyUpdater::class,
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param \Illuminate\Contracts\Events\Dispatcher $events
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
