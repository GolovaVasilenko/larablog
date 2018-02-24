<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
    public function posts()
    {
    	return $this->hasMany(Post::class);
    }

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }

	/**
	 * @param $fields
	 *
	 * @return User
	 */
    public static function add($fields)
    {
    	$user = new self();
    	$user->fill($fields);
    	$user->password = bcrypt($fields['password']);
    	$user->save();
    	return $user;
    }

	/**
	 * @param $fields
	 */
    public function edit($fields)
    {
    	$this->fill($fields);
    	$this->password = bcrypt($fields['password']);
    	$this->save();
    }

    public function remove()
    {
	    Storage::delete('uploads', $this->image);
    	$this->delete();
    }

	/**
	 * @param $image
	 */
	public function uploadAvatar($image)
	{
		if($image == null) return;

		Storage::delete('uploads', $this->image);
		$fileName = str_random(10) . '.' . $image->extension();
		$image->saveAs('uploads', $fileName);
		$this->image = $fileName;
		$this->save();
	}

	public function getAvatar()
	{
		if(null == $this->image){
			return '/image/avatar-default.png';
		}
		return '/uploads/' . $this->image;
	}

	/**
	 *
	 */
	public function makeAdmin()
	{
		$this->is_admin = 1;
		$this->save();
	}

	/**
	 *
	 */
	public function makeNormal()
	{
		$this->is_admin = 0;
		$this->save();
	}

	/**
	 * @param $value
	 */
	public function toggleAdmin($value)
	{
		if($value){
			return $this->makeAdmin();
		}

		return $this->makeNormal();
	}

	public function ban()
	{
		$this->banned = 1;
		$this->save();
	}

	public function active()
	{
		$this->banned = 0;
		$this->save();
	}

	public function toggleBan($value)
	{
		if($value){
			return $this->ban();
		}

		return $this->active();
	}
}
