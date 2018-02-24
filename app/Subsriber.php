<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subsriber extends Model
{
    public function add($email)
    {
		$sub = new self();
		$sub->email = $email;
		$sub->token = str_random(68);

		$sub->save();
		return $sub;
    }

    public function remove()
    {
    	$this->delete();
    }
}
