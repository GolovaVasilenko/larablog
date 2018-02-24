<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
	use Sluggable;

	protected $fillable = [
		'title',
		'excerpt',
		'body'
	];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
    public function category()
    {
    	return $this->hasOne(Category::class);
    }

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
    public function author()
    {
    	return $this->hasOne(User::class);
    }

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
    public function tags()
    {
    	return $this->belongsToMany(
    		Tag::class,
		    'posts_tags',
		    'post_id',
		    'tag_id'
	    );
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

	/**
	 * @param $fields
	 *
	 * @return Post
	 */
	public static function add($fields)
	{
		$post = new self();
		$post->fill($fields);
		$post->save();
		$post->author_id = 1;
		return $post;
	}

	/**
	 * @param $fields
	 */
	public function edit($fields)
	{
		$this->fill($fields);
		$this->save();
	}

	/**
	 * @throws \Exception
	 */
	public function remove()
	{
		Storage::delete('uploads', $this->image);
		$this->delete();
	}

	/**
	 * @param $image
	 */
	public function uploadImage($image)
	{
		if($image == null) return;

		Storage::delete('uploads', $this->image);
		$fileName = str_random(10) . '.' . $image->extension();
		$image->saveAs('uploads', $fileName);
		$this->image = $fileName;
		$this->save();
	}

	/**
	 * @param $id
	 */
	public function setCategory($id)
	{
		if($id == null) return;

		$this->category_id = $id;
		$this->save();
	}

	/**
	 * @param $ids
	 */
	public function setTags($ids)
	{
		if($ids == null) return;

		$this->tags()->sync($ids);
	}

	/**
	 * @return $this|void
	 */
	public function setVisible()
	{
		$this->visible = 1;
		$this->save();
	}

	/**
	 *
	 */
	public function setUnVisible()
	{
		$this->visible = 0;
		$this->save();
	}

	/**
	 * @param null $value
	 *
	 * @return Post|void
	 */
	public function toggleVisible($value = null)
	{
		if($value){
			return $this->setVisible();
		}

		return $this->setUnVisible();
	}

	/**
	 * @return string
	 */
	public function getImage()
	{
		if(null == $this->image){
			return '/image/no-image.png';
		}
		return '/uploads/' . $this->image;
	}
}
