<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

	const ALLOW = 1;
	const DISALLOW = 0;
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function post()
	{
		return $this->hasOne(Post::class);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function author()
	{
		return $this->hasOne(User::class);
	}

	public function allow()
	{
		$this->status = self::ALLOW;
		$this->save();
	}

	public function disallow()
	{
		$this->status = self::DISALLOW;
		$this->save();
	}

	/**
	 * @return int
	 */
	public function toggleStatus()
	{
		if($this->status == self::DISALLOW){
			return $this->status = self::ALLOW;
		}

		return $this->status = self::DISALLOW;
	}

	public function remove()
	{
		$this->delete();
	}
}
