<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Mpociot\Teamwork\Traits\UserHasTeams;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Cashier\Billable;
use App\Article;
use App\Role;
use App\Receipt;
use App\AddressType;

class User extends Authenticatable
{

    // Enable the realationship with teams
    // reference https://github.com/mpociot/teamwork
    use UserHasTeams;

    /**
     * Use the billble trait for casheer/stripe.
     */
    use Billable;

    /**
     * Use the Spatie Permissions pacakge
     * https://spatie.be/docs/laravel-permission/v3/basic-usage/basic-usage
     */
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'url',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
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
     * Retrieve the Name.
     *
     * @return string $name
     */
    public function getNameAttribute()
    {
        return $this->firstName . ' ' . $this->lastName; 
    }

    /**
     * Retrieve First Name.
     *
     * @return string $firstName
     */
    public function getFirstNameAttribute()
    {
        return $this->attributes['first_name'];
    }

    /**
     * Retrieve Last Name.
     *
     * @return string $lastName
     */
    public function getLastNameAttribute()
    {
        return $this->attributes['last_name'];
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function factory()
    {
        return UserFactory::new();
    }

    /**
     * Get the articles for a user
     */
    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    /**
     * Define the relationship with stores.
     *
     * @return App\Stores
     */
    public function stores()
    {
        return $this->hasMany('App\Store');
    }

    /**
     * Define the relationship with receipts.
     *
     * @return App\Receipts
     */
    public function receipts()
    {
        return $this->hasMany('App\Receipt', 'user_email', 'email');
    }

    /**
     * Define the relationship with images.
     *
     * @return App\Image
     */
    public function images()
    {
        return $this->hasMany('App\Image', 'owner_id', 'id');
    }

    /**
     * Define the relationship with Addresses.
     *
     * @return App\Address
     */
    public function addresses()
    {
        return $this->hasMany('App\Address');
    }

    /**
     * Retrieve Billing Address.
     *
     * @return App\Address
     */
    public function getBillingAddressAttribute()
    {
        //this should be a function on the addresses model
        return $this->addresses()->where('type', '=', AddressType::BILLING)->firstOrNew();
    }

    /**
     * Retrieve Shipping Address.
     *
     * @return App\Address
     */
    public function getShippingAddressAttribute()
    {
        //this should be a function on the addresses model
        return $this->addresses()->where('type', '=', AddressType::SHIPPING)->firstOrNew();
    }
}