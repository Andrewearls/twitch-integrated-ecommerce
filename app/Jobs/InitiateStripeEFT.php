<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Store;
use App\Receipt;
use App\ReceiptStatus;

/**
 * Initiate Stripe (E)lectronic (F)unds (T)ransfer
 */
class InitiateStripeEFT implements ShouldQueue
{

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The stripe connect partner to be payed
     *
     * @var \App\Team\Store\Stripe_User_Id
     * @var Receipt
     */
    protected $receipt, $accountPayable;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Receipt $receipt, $accountPayable)
    {        
        $this->accountPayable = $accountPayable;

        $this->receipt = $receipt;

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    }

    /**
     * Execute the Job.
     *
     * @return void
     */
    public function handle()
    {
        // Calculate fees
        $accruedExpence = $this->receipt->total;

        try {
            // Process ETF
            $transfer = \Stripe\Transfer::create([
                'amount' => $accruedExpence,
                'currency' => 'usd',
                'destination' => $this->accountPayable,
                'group' => $this->receipt->name,
            ]);

            // Mark as compleated
            $this->receipt->status = ReceiptStatus::EFT_TRANSFERED;
            $this->receipt->save();  
        } catch (Exception $e) {
            \Log::debug($e);
        }
        
    }
}
