<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name', 'slug', 'is_active'];
	public $timestamps = false;

    public function roles()
	{
		return $this->morphToMany('App\Role', 'rolable');
	}
}
