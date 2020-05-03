<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

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

    /**
    * Get the author of the post.
    */
    public function author()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
