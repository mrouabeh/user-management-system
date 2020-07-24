<?php

namespace App;

use App\Role;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

	public function roles()
	{
		return $this->morphToMany('App\Role', 'rolable');
	}

	public function hasRole(string $role)
	{
		if ($this->roles()->where('name', $role)->exists())
			return true;

		return false;
	}

	public function hasAnyRoles(array $roles)
	{
		if ($this->roles()->whereIn('name', $roles)->exists())
			return true;

		return false;
	}

	public function setRole(string $role)
	{
		if (Role::where('name', $role)->exists())
		{
			$this->roles()->attach(Role::where('name', $role)->first());
		}
	}

	public function setRoles(array $rolesName)
	{
		$roles = [];

		foreach ($rolesName as $role) {
			if (Role::where('name', $role)->exists())
			{
				$roles[] = Role::where('name', $role)->first()->id;
			}
		}

		if (!empty($roles))
		{
			$this->roles()->sync($roles);
		}
	}

//	Todo: function appendRole

	public function hasPermission(string $slug)
	{
		foreach ($this->roles()->get() as $role)
		{
			if ($role->hasPermission($slug))
				return true;
		}

		return false;
	}

	public function getPermissions()
	{
		$permissions = [];

		foreach ($this->roles()->get() as $role)
		{
			foreach ($role->permissions()->get() as $permission)
			{
				if (!array_key_exists($permission->slug, $permissions))
				{
					$permissions[$permission->slug] = $permission;
				}
			}
		}

		return $permissions;
	}
}
