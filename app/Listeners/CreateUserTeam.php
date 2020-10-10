<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Coordinator\TeamsCoordinator;

class CreateUserTeam
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
        $teamsCoordinator = new TeamsCoordinator($event->user);
        $team = $teamsCoordinator->createTeam('team ' . $event->user->name);
        $teamsCoordinator->login($team);
    }
}
