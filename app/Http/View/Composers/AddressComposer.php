<?php

namespace App\Http\View\Composers;

// use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\View\View;
use Illuminate\Http\Request;

/**
 * Bind Address data to the view
 */
class AddressComposer
{
	protected $user;

	function __construct(Request $request)
	{
		$this->user = $request->user();
		// $this->teamsCoordinator = new TeamsCoordinator($request->user());
		
	}

	/**
	 * bind data to the view.
	 *
	 * @param View $view
	 * @return void
	 */
	public function compose(View $view)
	{
		if($this->user) {
			$view->with('billingAddress', $this->user->billingAddress)->with('shippingAddress', $this->user->shippingAddress);
		}
	}
}