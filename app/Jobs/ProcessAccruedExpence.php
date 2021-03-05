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

class ProcessAccruedExpence implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $store, $receipts;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Store $store)
    {
        $this->store = $store;
        // Get the receipts That are ready to be cached out
        $this->receipts = $store->receipts
                                ->where('status', '=', ReceiptStatus::EFT_READY);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // for each receipt initeiate EFT
        foreach ($this->receipts as $receipt) {
            $receipt->status = ReceiptStatus::EFT_PROCESSING;
            $receipt->save();
            InitiateStripeEFT::dispatch($receipt, $this->store->stripeId);
        }
    }
}
