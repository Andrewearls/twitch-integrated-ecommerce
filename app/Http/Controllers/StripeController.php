<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class StripeController extends Controller
{

	/**
	 * The user is returning from stripe billing portal.
	 *
	 * @return view
	 */
	public function index(Request $request)
	{
		dd('stripe-index');
		return $request;
	}

	/**
	 * Send the user to Stripes billing portal.
	 *
	 * @return redirect
	 */
    public function billingPortal(Request $request)
    {
    	$customer = $request->user()->createOrGetStripeCustomer();
    	return $request->user()->redirectToBillingPortal(
    		route('stripe-index')
    	);
    }

    /**
     * return the stripe checkout view.
     *
     * @return view
     */
    public function checkout(Request $request)
    {
    	return view('stripe.checkout');
    }

    /**
     * process the payment with stripe.
     *
     * @return view
     */
    public function processCheckout(Request $request)
    {
    	return "here";

    	$stripeCharge = $request->user()->charge(100,$paymentMethod);
    	return $stripeCharge;
    }

}
