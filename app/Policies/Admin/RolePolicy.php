<?php

namespace App\Policies\Admin;

use App\Role;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

	public function manage(User $user)
	{
		return $user->hasPermission('manage.roles');
	}

    public function viewAny(User $user)
    {
		return $user->hasPermission('view.roles');
    }

    public function view(User $user)
    {
		return $user->hasPermission('view.roles');
    }

    public function create(User $user)
    {
		return $user->hasPermission('create.roles');
    }

    public function update(User $user)
    {
		return $user->hasPermission('edit.roles');
    }

    public function delete(User $user)
    {
		return $user->hasPermission('delete.roles');
    }
}
