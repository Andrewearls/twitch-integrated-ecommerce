<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Product extends Model
{

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'store_id', 'name', 'price', 'options',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'user_id',
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
     * Get the product id.
     *
     * @return integer
     */
    public function getIdAttribute($id)
    {
    	// this should probably be serialized or something.
    	return $id;
    }

    /**
     * Get the product options.
     *
     * @return array
     */
    public function getOptionsAttribute($options)
    {
    	if(!empty($options)){
    		return json_decode($options, true);
    	}

    	return [];
    }

    /**
     * Get the price in cents format.
     *
     * @param price
     * @return cents price
     */
    public function getPriceAttribute($price)
    {
        // dd(toDollars($price));
        // return toDollars($price);
        return $price;
    }

    /**
     * Define the Store relationship.
     *
     * @return Store
     */
    public function store()
    {
        return $this->belongsTo('App\Store');
    }

    /**
     * Define the Image relationship.
     *
     * @return App\Image
     */
    public function images()
    {
        return $this->belongsToMany('App\Image');
    }
}
