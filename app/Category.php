<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Article;

class Category extends Model
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
    	return $this->belongsToMany('App\Article', 'category_article');
    }
}
