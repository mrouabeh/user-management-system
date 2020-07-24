<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRole;
use App\Http\Requests\Admin\UpdateRole;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RolesController extends Controller
{
    public function index()
    {
        if (Gate::allows('view.roles'))
		{
			$roles = Role::paginate(15);

			return view('admin.roles.index', [
				'roles' => $roles
			]);
		}

		return redirect()->back();
    }

    public function create()
    {
        if (Gate::allows('create.roles'))
		{
			$permissions = Permission::all();

			return view('admin.roles.create', [
				'permissions' => $permissions
			]);
		}

		return redirect()->back();
    }

    public function store(StoreRole $request)
    {
        if (Gate::allows('create.roles'))
		{
			$role = new Role();

			$role->name = $request->name;
			$role->is_active = $request->is_active ? 1 : 0;

			$role->save();
			if ($request->has('permissions'))
			{
				$role->permissions()->sync($request->permissions);
			}

			return redirect()->route('admin.roles.index');
		}

		return redirect()->back();
    }

    public function show(Role $role)
	{
		if (Gate::allows('view.roles'))
		{
			return view('admin.roles.show', [
				'role' => $role
			]);
		}

		return redirect()->back();
	}

    public function edit(Role $role)
    {
        if (Gate::allows('edit.roles'))
		{
			$permissions = Permission::all();

			return view('admin.roles.edit', [
				'role' => $role,
				'permissions' => $permissions
			]);
		}

        return redirect()->back();
    }

    public function update(UpdateRole $request, Role $role)
    {
        if (Gate::allows('edit.roles'))
		{
			if (!$role->is_protected)
			{
				$role->name = $request->name;
				$role->is_active = $request->is_active ? 1 : 0;

				$role->save();

				if ($request->has('permissions'))
				{
					$role->permissions()->sync($request->permissions);
				}
				return redirect()->route('admin.roles.index');
			}
		}

        return redirect()->back();
    }

    public function destroy(Role $role)
    {
        if (Gate::allows('delete.roles'))
		{
			if (!$role->is_protected)
			{
				$role->delete();

				return redirect()->route('admin.roles.index');
			}
		}

        return redirect()->back();
    }
}
