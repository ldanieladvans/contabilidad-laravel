<?php

namespace App\Listeners;
use Illuminate\Support\Facades\Log;
class UserEventSubscriber
{

    

    /**
     * Handle user login events.
     */
    public function onUserLogin($event) {
        Log::info('TODO register some action');
    }

    /**
     * Handle user logout events.
     */
    public function onUserLogout($event) {
    	Log::info('TODO register some action');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'Illuminate\Auth\Events\Login',
            'App\Listeners\UserEventSubscriber@onUserLogin'
        );

        $events->listen(
            'Illuminate\Auth\Events\Logout',
            'App\Listeners\UserEventSubscriber@onUserLogout'
        );
    }

}