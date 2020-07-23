<?php

namespace App\Policies\Admin;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

	public function manage(User $user)
	{
		return $user->hasPermission('manage.users');
	}

    public function viewAny(User $user)
    {
		return $user->hasPermission('view.users');
    }

    public function view(User $user)
    {
        return $user->hasPermission('view.users');
    }

    public function create(User $user)
    {
		return $user->hasPermission('create.users');
    }

    public function update(User $user)
    {
		return $user->hasPermission('edit.users');
    }

    public function delete(User $user)
    {
		return $user->hasPermission('delete.users');
    }
}
