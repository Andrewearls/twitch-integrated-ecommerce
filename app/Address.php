<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'address', 'address_two', 'country', 'city', 'state', 'zip', 'type',
    ];

    /**
     * return address two.
     *
     * @return string $addressTwo
     */
    public function getAddressTwoAttribute()
    {
    	return $this->attributes['address_two'];
    }
}
