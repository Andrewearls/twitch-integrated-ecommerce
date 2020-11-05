<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Mpociot\Teamwork\Traits\UserHasTeams;
use Laravel\Cashier\Billable;
use App\Article;
use App\Role;
use App\Receipt;

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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'url',
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
     * Get the articles for a user
     */
    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    /**
     * Get the roles of this user
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role', 'user_role');
    }

    /**
     * Check for a given role
     *      This looks like it should be in the middleware
     */
    public function hasRole($roleTitle)
    {
        $role = Role::where('title', $roleTitle)->first();

        if($this->roles->contains($role)) {
            return 'true';
        }

        return 'false';
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
        return $this->hasMany('App\Receipt');
    }
}