<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUser;
use App\Http\Requests\Admin\UpdateUser;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        if (Gate::allows('manage.users'))
		{
			$users = User::paginate(15);

			return view('admin.users.index', [
				'users' => $users
			]);
		}

        return redirect()->back();
    }

    public function create()
    {
        if (Gate::allows('create.users'))
		{
			$roles = Role::all();

			return view('admin.users.create', [
				'roles' => $roles
			]);
		}

		return redirect()->back();
	}

    public function store(StoreUser $request)
    {
        if (Gate::allows('create.users'))
		{
			$user = new User();

			$user->name = $request->name;
			$user->email = $request->email;
			$user->password = Hash::make($request->password);

			$user->save();

			if ($request->has('roles'))
			{
				$user->roles()->sync($request->roles);
			}
			else
			{
				$user->setRole('user');
			}

			return redirect()->route('admin.users.index');
		}

		return redirect()->back();
    }

    public function show(User $user)
    {
        if (Gate::allows('view.users'))
		{
			return view('admin.users.show', [
				'user' => $user
			]);
		}

        return redirect()->back();
    }

    public function edit(User $user)
    {
        if (Gate::allows('edit.users'))
		{
			$roles = Role::all();

			return view('admin.users.edit', [
				'user' => $user,
				'roles' => $roles
			]);
		}

        return redirect()->back();
    }

    public function update(UpdateUser $request, User $user)
    {
		if (Gate::allows('edit.users'))
		{
			$user->name = $request->name;
			$user->email = $request->email;
			if ($request->has('password'))
			{
				$user->password = Hash::make($request->password);
			}

			$user->save();
			if (Auth::user()->id != $user->id)
			{
				if ($request->has('roles'))
				{
					$user->roles()->sync($request->roles);
				}
				else
				{
					$user->roles()->sync(Role::where('name', 'user')->first()->id);
				}
			}
			return redirect()->route('admin.users.index');
		}

		return redirect()->back();
    }

    public function destroy(User $user)
    {
        if (Gate::allows('delete.users'))
		{
			if (!$user->hasRole('admin'))
			{
				$user->delete();
				return redirect()->back();
			}
		}

        return redirect()->back();
    }
}
