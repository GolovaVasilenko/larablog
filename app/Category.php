<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
	use Sluggable;

	protected $fillable = ['title'];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
    public function posts()
    {
    	return $this->hasMany(Post::class);
    }

	/**
	 * Return the sluggable configuration array for this model.
	 *
	 * @return array
	 */
	public function sluggable()
	{
		return [
			'slug' => [
				'source' => 'title'
			]
		];
	}

	public static function getAllCategories()
	{
		return self::all();
	}
}
