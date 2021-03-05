<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StripeAccountStatus extends Model
{
    use HasFactory;

    const DISCONNECTED = "StripeAccountDisconnected";
    const PENDING 	= "StripeAccountPending";
    const CONNECTED = "StripeAccountConnected";

}
