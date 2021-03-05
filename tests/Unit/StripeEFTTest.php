<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Team;
use App\Receipt;
use App\ReceiptStatus;
use App\Jobs\InitiateStripeEFT;

class StripeEFTTest extends TestCase
{
    /**
     * Check for team store payable account id.
     *
     * @return void
     */
    public function PayableAccountCreation()
    {
    	$store = Team::find(1)->store;

        $this->assertNotEmpty($store->stripeId);
    }

    /**
     * Stripe EFT initiates/completes.
     *
     * @return view
     */
    public function EFTCompleated()
    {
    	$receipt = Receipt::factory()->create();

    	$accountPayable = Team::first()->store->stripe_user_id;

    	InitiateStripeEFT::dispatch($receipt, $accountPayable);

    	$this->assertEquals($receipt->status, ReceiptStatus::EFT_TRANSFERED);
    }

}
