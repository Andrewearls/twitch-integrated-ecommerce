<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\StripeAccountStatus;

class StripeAccountController extends Controller
{
	/**
	 * crate new instance.
	 *
	 * @return void
	 */
	public function __construct(Request $request)
	{
		$this->stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
	}
    /**
     * Create a Stripe account for the store owner.
     *
     * @return not sure yet
     */
    public function create(Request $request)
    {
    	$account = $this->stripe->accounts->create([
    		'type' => 'express',
		  	'country' => 'US',
		  	// 'email' => 'testing@testing.com',//$request->user()->email,
		  	'capabilities' => [
		    	'card_payments' => [
		    		'requested' => true
		    	],
		    	'transfers' => [
		    		'requested' => true
		    	],
		  	],
    	]);

    	$store = $request->user()->currentTeam->store;
    	$store->stripeId = $account->id;
    	// dd($account->id);
    	$store->stripe_account_status = StripeAccountStatus::PENDING;
    	$store->save();

    	return redirect()->route('stripe-account-pending');
		
    }

    /**
     * Redirect the user to Stripe for account setup.
     *
     * @param Request
     * @return redirect
     */
    public function pending(Request $request)
    {
    	\Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    	$accountId = $request->user()->currentTeam->store->stripe_user_id;

    	$account_links = \Stripe\AccountLink::create([
  			'account' => $accountId,
  			'refresh_url' => route('stripe-account-pending'),
  			'return_url' => route('stripe-account-create-callback'),
  			'type' => 'account_onboarding',
		]);

		return redirect($account_links->url);
    }

    /**
     * Handle the callback from stripe account creation.
     *
     * @param Request
     * @return view
     */
    public function createCallback(Request $request)
    {
    	$stripe = new \Stripe\StripeClient(
    		env('STRIPE_SECRET'),
    	);

    	$store = $request->user()->currentTeam->store;

    	$stripeResponse = $stripe->accounts->retrieve(
  			$store->stripeId,
  			[]
  		);

  		// if()

    	dd($stripeResponse);
    }
}
