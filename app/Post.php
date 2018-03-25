<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
	use Sluggable;

	const IS_DRAFT = 0;
	const IS_PUBLIC = 1;

	/**
	 * @var array
	 */
	protected $fillable = [
		'title',
		'excerpt',
		'body'
	];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function author()
	{
		return $this->belongsTo(User::class, 'user_id');
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
		$this->removeImage();
		$this->delete();
	}

	protected function removeImage()
	{
		if($this->image != null){
			Storage::delete('uploads/'. $this->image);
		}
	}

	/**
	 * @return string
	 */
	public function getImage()
	{
		if(null == $this->image){
			return '/img/no_image.png';
		}
		return '/uploads/' . $this->image;
	}

	/**
	 * @param $image
	 */
	public function uploadImage($image)
	{
		if($image == null) { return; }

		$this->removeImage();
		$filename = str_random(10) . '.' . $image->extension();
		$image->storeAs('uploads', $filename);
		$this->image = $filename;
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

	public function setDraft()
	{
		$this->status = Post::IS_DRAFT;
		$this->save();
	}

	public function setPublic()
	{
		$this->status = Post::IS_PUBLIC;
		$this->save();
	}

	public function toggleStatus($value)
	{
		if($value == null)
		{
			return $this->setDraft();
		}

		return $this->setPublic();
	}

	public function getCategoryTitle()
	{
		return ($this->category !== null) ? $this->category->title : 'Нет категории';
	}

	public function getTagsTitles()
	{
		if(!empty($this->tags)){
			return implode(", ", $this->tags->pluck('title')->all());
		}
		return 'Тегов нет';
	}
}
