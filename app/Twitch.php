<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Twitch extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'twitch';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'channel', 'display',
    ];
}
