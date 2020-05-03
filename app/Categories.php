<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Articles;

class Categories extends Model
{
	/**
	 * The articles belonging to this category
	 */
    public function articles()
    {
    	return $this->belongsToMany('articles');
    }
}
