<?php

namespace App\Http\Controllers\Audience\Shopper;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Receipt;
use App\Cart\CartInterface as Cart;

class StripeController extends Controller
{

	/**
	 * The user is returning from stripe billing portal.
	 *
	 * @param  request
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
	 * @param  request
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
     * @param  request
     * @return view
     */
    public function checkout(Request $request, Cart $cart)
    {
        // dd($cart->instance());
    	return view('stripe.checkout')->with(['cart' => $cart->checkout()]);
    }

    /**
     * process the payment with stripe.
     *
     * @param  request
     * @return view
     */
    public function processCheckout(Request $request, Cart $cart)
    {
    	try {
            // Charge with stripe
	    	$stripeCharge = $request->user()->charge(toCents($cart->checkout()->total),$request->paymentMethod);

            // store the cart
            $cart->process($request->user(), $stripeCharge->id);

            // create a receipt
            $receipt = Receipt::create([
                'user_id' => $request->user()->id,
                'cart_name' => $cart->instance(),
                'payment' => $stripeCharge->id,
            ]);

	    	//email the receipt to the user

	    	return route('shopping-receipt', ['receiptId' => $receipt->id]);
    	} catch (Exception $e) {
    		\Log::error($e);
    		return "false";
    	}
    	
    }

}
