<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mpociot\Teamwork\Traits\UsedByTeams;

class Store extends Model
{
    // Limit model to current team
    //https://github.com/mpociot/teamwork#limit-models-to-current-team
    // use UsedByTeams;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'team_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    	'id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Return the Stripe Id.
     *
     * @param stripe_user_id
     * @return String id
     */
    public function getStripeIdAttribute($stripe_user_id)       
    {
        return $stripe_user_id;
    }

    /**
     * Set the Stripe Id.
     *
     * @param string $value
     * @return void
     */
    public function setStripeIdAttribute($stripeAccountId)
    {
        $this->attributes['stripe_user_id'] = $stripeAccountId;
    }

    /**
     * Define the relationship with the products.
     *
     * @return App\Product
     */
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
