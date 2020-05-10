<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
    ];

    /**
     * Get the users who are of this role
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
