<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserLoginListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        // when the user logs in
        // log them into their primary team
        $coordinator = new TeamsCoordinator($event->user);
        $team = $coordinator->primaryTeam();

        // if they don't have a team
        if (is_null($team)){
            $team = $coordinator->newPrimaryTeam();
        }
        
        // make a primary team for the user and log them in
        $team->login();
    }
}
