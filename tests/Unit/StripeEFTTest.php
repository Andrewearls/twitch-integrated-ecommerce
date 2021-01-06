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
    public function testPayableAccountExists()
    {
    	$team = Team::find(1);

        $this->assertNotEmpty($team->store->stripe_user_id);
    }

    /**
     * Stripe EFT initiates/completes.
     *
     * @return view
     */
    public function testEFTCompleated()
    {
    	$receipt = Receipt::factory()->create();

    	$accountPayable = Team::first()->store->stripe_user_id;

    	InitiateStripeEFT::dispatch($receipt, $accountPayable);

    	$this->assertEquals($receipt->status, ReceiptStatus::EFT_TRANSFERED);
    }

}
