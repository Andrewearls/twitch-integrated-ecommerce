<?php

namespace App\Http\View\Composers;

// use Illuminate\Support\Facades\Auth;
use PragmaRX\Countries\Package\Countries;
use Illuminate\View\View;

/**
 * Bind Country and State data to the view
 *
 * https://github.com/antonioribeiro/countries
 */
class CountryStateComposer
{
	protected $country;

	function __construct()
	{
		$this->country = Countries::where('name.common', "United States")->first()->hydrateStates();		
	}

	/**
	 * bind data to the view.
	 *
	 * @param View $view
	 * @return void
	 */
	public function compose(View $view)
	{
		$view->with('country', $this->country);
	}
}