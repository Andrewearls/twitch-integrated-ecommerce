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

        $billingAddress = Address::create([
            // 'user_id' => $request->user()->id ?? 0,
            'address' => $request->billing['address'],
            'address_two' => $request->billing['addressTwo'],
            'city' => $request->billing['city'],
            'country' => $request->billing['country'],
            'state' => $request->billing['state'],
            'zip' => $request->billing['zip'],
            'type' => AddressType::BILLING,
        ]);

        if (isset($request->shipping['same'])) {
            $shippingAddress = Address::create([
                // 'user_id' => $request->user()->id ?? 0,
                'address' => $request->billing['address'],
                'address_two' => $request->billing['addressTwo'],
                'city' => $request->billing['city'],
                'country' => $request->billing['country'],
                'state' => $request->billing['state'],
                'zip' => $request->billing['zip'],
                'type' => AddressType::SHIPPING,
            ]);
        } else {
            $shippingAddress = Address::create([
                // 'user_id' => $request->user()->id ?? 0,
                'address' => $request->shipping['address'],
                'address_two' => $request->shipping['addressTwo'],
                'city' => $request->shipping['city'],
                'country' => $request->shipping['country'],
                'state' => $request->shipping['state'],
                'zip' => $request->shipping['zip'],
                'type' => AddressType::SHIPPING,
            ]);
        }

        // attach address to user

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
