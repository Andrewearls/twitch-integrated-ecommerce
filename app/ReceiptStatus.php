<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceiptStatus extends Model
{
    use HasFactory;

    const PAYED = "CustomerHasPayed";
    const EFT_READY = "ReadyForEFT";
    const EFT_PROCESSING = "ProcessingEFT";
    const EFT_TRANSFERED = "EFTCompleated";
}
