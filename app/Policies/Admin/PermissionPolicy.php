<?php

namespace App\Policies\Admin;

use App\Permission;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

	public function manage(User $user)
	{
		return $user->hasPermission('manage.permissions');
	}

    public function viewAny(User $user)
    {
		return $user->hasPermission('view.permissions');
    }

    public function view(User $user)
    {
		return $user->hasPermission('view.permissions');
    }

    public function create(User $user)
    {
		return $user->hasPermission('create.permissions');
    }

    public function update(User $user)
    {
		return $user->hasPermission('edit.permissions');
    }

    public function delete(User $user)
    {
		return $user->hasPermission('delete.permissions');
    }
}
