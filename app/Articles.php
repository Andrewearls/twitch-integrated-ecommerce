<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{

	/**
	     * The table associated with the model.
	     *
	     * @var string
	     */
	    protected $table = 'article';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'picture', 'user_id',
    ];
}
