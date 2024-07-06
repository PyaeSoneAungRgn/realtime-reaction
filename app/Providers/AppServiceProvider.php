<?php

namespace App\Providers;

use App\Events\ReactionUpdated;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Qirolab\Laravel\Reactions\Events\OnDeleteReaction;
use Qirolab\Laravel\Reactions\Events\OnReaction;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen(function (OnReaction $event) {
            ReactionUpdated::dispatch($event->reactable, $event->reactBy, $event->reaction);
        });

        Event::listen(function (OnDeleteReaction $event) {
            ReactionUpdated::dispatch($event->reactable, $event->reactBy);
        });
    }
}
