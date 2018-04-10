<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model
{
    protected $table = 'user_meta';
	protected $guarded = array();

	public function getUserInfo() {
		return $this->hasOne('App\User','userid');
	}
}
