<?php 

namespace App\Coordinators;

use App\Coordinators\PermissionsCoordinator as Permission;
use App\Models\Team;
use App\Models\User;

/**
 * Cordinate store actions
 */
class TeamsCoordinator
{
	private $user;
	private $loggedInTeam;

	function __construct(User $user)
	{
		// set the user for this instance
		$this->user = $user;

		// set the users logged in team
		$this->loggedInTeam = $this->setLoggedInTeam();
	}

	/**
	 * Log a user into a team.
	 *
	 * @param team
	 * @return bool
	 */
	public function login(Team $team)
	{
		try {
			$this->user->switchTeam($team);
		} catch (Exception $e) {
			return false;
		}

		$this->loggedInTeam = $this->setLoggedInTeam();

		return true;
	}

	/**
	 * Create a new team for the user.
	 *
	 * @param string name
	 * @param App\Role\Const role
	 * @return App\Models\Team
	 */
	public function createTeam($name, $permissions = [Permission::CAN_SHOP])
	{
		// dd($this->user->getKey());
		// create the team
		$team = Team::create([
			'name' => $name,
			'owner_id' => $this->user->id,
		]); 

		// attach the user to the team
		$this->user->teams()->attach($team, ['permissions' => json_encode($permissions)]);

		$this->login($team);

		// return the team
		return $team;
	}

	/**
	 * Set the users logged in team for this instance.
	 *
	 * @return App\Models\Team
	 */
	private function setLoggedInTeam()
	{
		// // check if user is logged into a team
		// $team = session()->get('team');
		
		// // if user is logged in
		// if (!is_null($team)) {
		// 	return Team::find($team)->first();
		// }
		// dd($this->user->currentTeam);
		// dd('$this->user->name');

		return $this->user->currentTeam;
		// return new Team;
	}

	/**
	 * retrieve the logged in team.
	 *
	 * @return App\Models\Team
	 */
	public function getLoggedInTeam()
	{
		return $this->loggedInTeam;
	}
}