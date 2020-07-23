<?php

namespace App;

use App\Permission;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'is_active'];
    public $timestamps = false;

    public function users()
	{
		return $this->morphedByMany('App\User', 'rolable');
	}

	public function permissions()
	{
		return $this->morphedByMany('App\Permission', 'rolable');
	}

	public function hasPermission(string $slug)
	{
		if ($this->permissions()->where('slug', $slug)->exists())
			return true;

		return false;
	}

	public function hasAnyPermissions(array $slugs)
	{
		if ($this->permissions()->whereIn('slug', $slugs)->exists())
			return true;

		return false;
	}

	public function setPermission(string $slug)
	{
		if (Permission::where('slug', $slug)->exists())
		{
			$this->permissions()->attach(Permission::where('slug', $slug)->first());
		}
	}

	public function setPermissions(array $slugs)
	{
		$permissions = [];

		foreach ($slugs as $slug)
		{
			if (Permission::where('slug', $slug)->exists())
			{
				$permissions[] = Permission::where('slug', $slug)->first()->id;
			}
		}

		if (!empty($permissions))
		{
			$this->permissions()->sync($permissions);
		}
	}

//	Todo: function appendPermission
}
