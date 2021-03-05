<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Team;

class StripeController extends Controller
{
    /**
     * set the team stripe id.
     *
     * @param Request
     * @return connection
     */
    public function index(Request $request, $code)
    {
    	// dd($request->code);
    	if ($request->code) {
    		$store = Team::find(env('APP_TEAM'))->store;
    		\Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    		$response = \Stripe\OAuth::token([
    			'grant_type' => 'authorization_code',
    			'code' => $request->code,
    		]);

    		$store->stripe_user_id = $response->stripe_user_id;
    		$store->save();
       	} elseif ($request->error) {
    		return 'something went wrong ' . $request->error_description;
    	}
    	return redirect()->route('store-edit');
    }
}
