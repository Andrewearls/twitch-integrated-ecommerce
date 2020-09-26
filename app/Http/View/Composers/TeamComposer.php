<?php

namespace App\Http\View\Composers;

// use Illuminate\Support\Facades\Auth;
use App\User;
use App\Coordinators\TeamsCoordinator;
use Illuminate\View\View;
use Illuminate\Http\Request;

/**
 * Bind team data to the view
 */
class TeamComposer
{
	protected $teamsCoordinator;

	function __construct(Request $request)
	{
		$this->teamsCoordinator = new TeamsCoordinator($request->user());
		
	}

	/**
	 * bind data to the view.
	 *
	 * @param View $view
	 * @return void
	 */
	public function compose(View $view)
	{
		// dd('$this->teamsCoordinator');
		$team = $this->teamsCoordinator->getLoggedInTeam();
		// $team->name = 'here';
		$view->with('team', $team);
	}
}