<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressType extends Model
{
    use HasFactory;

    const BILLING = "BillingAddress";
    const SHIPPING = "ShippingAddress";
}
