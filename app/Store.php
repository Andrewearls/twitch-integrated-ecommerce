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
     * Define the relationship with the products.
     *
     * @return App\Product
     */
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
