<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Articles;

class Categories extends Model
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
	 * The articles belonging to this category
	 */
    public function articles()
    {
    	return $this->belongsToMany('articles');
    }
}
