<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Category;

class Article extends Model
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
        'title', 'content', 'picture', 'user_id', 'url',
    ];

    /**
    * Get the author of the post.
    */
    public function author()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    /**
     * Get the categories for this article
     */
    public function categories()
    {
        return $this->belongsToMany('App\Category', 'category_article');
    }
}
