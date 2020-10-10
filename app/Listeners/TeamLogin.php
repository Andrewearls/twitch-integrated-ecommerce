<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Coordinators\TeamsCoordinator;

class TeamLogin
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
        $user = $event->user;
        $teamsCoordinator = new TeamsCoordinator($user);
        $teams = $user->teams;

        if ($teams->count() < 1) {
            // create a team for the user
            $teamsCoordinator->createTeam('team ' . $user->name);
        }

        if ($teams->count() === 1) {
            // sign user into team
            $teamsCoordinator->login($teams->first());
        }
    }
}
