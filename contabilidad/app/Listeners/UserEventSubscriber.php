<?php

namespace App\Listeners;
use Illuminate\Support\Facades\Log;
use App\Empresa;
class UserEventSubscriber
{

    

    /**
     * Handle user login events.
     */
    public function onUserLogin($event) {
        Log::info('TODO register some action');
        $emps = Empresa::all();
        if(count($emps) > 0){
            $emp_obj = $emps[0];
            \Session::put('emp_rfc',$emps[0]->emp_rfc);
            \Session::put('emp_name',$emps[0]->emp_nom);
        }
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