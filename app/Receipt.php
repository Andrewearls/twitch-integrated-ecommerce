<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_email', 'cart_content', 'payment', 'total', 'current_status', 'status',
    ];

    /**
     * Define the relationship with the user.
     *
     * @return App\User
     */
    public function user()
    {
    	return $this->belongsTo('App\User', 'user_email', 'email');
    }
}
