<?php

namespace App\Http\Controllers\Audience\Shopper;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Receipt;
use App\ReceiptStatus;
use App\Address;
use App\AddressType;
use App\Cart\CartInterface as Cart;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmation;
use App\Http\Requests\CheckoutFormValidator;

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
        // i don't think this is being used
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
     * collect and store the addresses.
     *
     * @param Request
     * @return view
     */
    public function addresses(CheckoutFormValidator $request, Cart $cart)
    {
        // dd($request->all());
        //store addresses

        $billingAddress = $request->user()->billingAddress;
        $shippingAddress = $request->user()->shippingAddress;
        // dd($billingAddress);

        $billingAddress->address = $request->billing['address'];
        $billingAddress->address_two = $request->billing['addressTwo'];
        $billingAddress->city = $request->billing['city'];
        $billingAddress->country = $request->billing['country'];
        $billingAddress->state = $request->billing['state'];
        $billingAddress->zip = $request->billing['zip'];
        $billingAddress->type = AddressType::BILLING;

        if (isset($request->shipping['same'])) {
            $shippingAddress->address = $request->billing['address'];
            $shippingAddress->address_two = $request->billing['addressTwo'];
            $shippingAddress->city = $request->billing['city'];
            $shippingAddress->country = $request->billing['country'];
            $shippingAddress->state = $request->billing['state'];
            $shippingAddress->zip = $request->billing['zip'];
            $shippingAddress->type = AddressType::SHIPPING;

        } else {
            $shippingAddress->address = $request->shipping['address'];
            $shippingAddress->address_two = $request->shipping['addressTwo'];
            $shippingAddress->city = $request->shipping['city'];
            $shippingAddress->country = $request->shipping['country'];
            $shippingAddress->state = $request->shipping['state'];
            $shippingAddress->zip = $request->shipping['zip'];
            $shippingAddress->type = AddressType::SHIPPING;

        }

        // attach address to user
        $billingAddress->save();
        $shippingAddress->save();

        //create receipt
        $receipt = Receipt::create([
            'user_email' => $request->email,
            // this line should be refactored
            'cart_content' => $cart->instance($request->user()),
            // this line should be refactored
            'total' => toCents($cart->checkout()->total),
            // 'payment' => $request->paymentMethod,
            'status' => ReceiptStatus::NOTPAYED,
        ]);


        //redirect to payment
        return redirect()->route('stripe-payment', ['receiptId' => $receipt->id, 'cart' => $cart]);
    }

    /**
     * Return the payment collection form.
     *
     * @param Request
     * @return view
     */
    public function payment(Request $request, $receiptId, Cart $cart)
    {
        // dd($cart);
        return view('stripe.checkout.payment-collection')->with(['cart' => $cart->checkout(), 'receiptId' => $receiptId]);
    }

    /**
     * Process the payment with stripe.
     *
     * @param  request
     * @return view
     */
    public function processCheckout(Request $request, Cart $cart, $receiptId)
    {
        // \Log::error($receiptId);
        // dd($request->query('receiptId'));
        // \Log::error($request->all());
        $user = $request->user();
        // \Log::error($user);
        // if (empty($user)) {
        //     $user = new User;
        //     $user->email = $request->email;
        //     // $user->save();
        // }
        // \Log::error($cart->instance($user));
        // \Log::error($cart->checkout()->total))*100);
    	try {
            // $chargeAmount = toCents($cart->checkout()->total);
            // \Log::error($cart->content());
            // create a receipt
            $receipt = Receipt::find($receiptId);
            $chargeAmount = $receipt->total;
            // \Log::error($receipt->total);

            // Charge with stripe
            $stripeCharge = $user->charge($chargeAmount, $request->paymentMethod, ['transfer_group' => $receipt->id]);

            $receipt->status = ReceiptStatus::PAYED;
            // \Log::error($receipt);
            $receipt->save();

            // store the cart
            $cart->process($user, $receipt->id);       
            // $receipt->refresh();
            
            

	    	// email the receipt to the user
            // This should be done in a queued job
            Mail::to('andrew.e.earls@gmail.com')->send(new OrderConfirmation($receipt));

	    	return route('shopping-receipt', ['receiptId' => $receipt->id]);
    	} catch (Exception $e) {
    		\Log::error($e);
    		return "false";
    	}
    	
    }

}
