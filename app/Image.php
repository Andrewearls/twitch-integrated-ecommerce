<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
    	'owner_id', 'team_id', 'encoded_image',
    ];

    /**
     * Get the decoded image.
     *
     * @return image
     */
    public function getImageAttribute()
    {
    	return 'data:image/png;base64, ' . $this->encoded_image;
    }

    /**
     * Set the encoded image.
     *
     * @param file $image
     * @return void
     */
    public function setImageAttribute($image)
    {
    	$this->attributes['encoded_image'] = base64_encode($image);
    }

    /**
     * Define the relationship with users.
     *
     * @return \App\User
     */
    public function owner()
    {
    	return $this->belongsTo(App\User::class);
    }

    /**
     * Define the relationship with teams.
     *
     * @return \App\Tean
     */
    public function team()
    {
    	return $this->belongsTo(App\Team::class);
    }

    /**
     * Define the relationship with Products.
     *
     * @return App\Product
     */
    public function products()
    {
    	return $this->belongsToMany('App\Product');
    }

}
