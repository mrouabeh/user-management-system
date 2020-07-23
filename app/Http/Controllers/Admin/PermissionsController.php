<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Permission;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Admin\StorePermission;
use App\Http\Requests\Admin\UpdatePermission;

class PermissionsController extends Controller
{
    public function index()
    {
        if (Gate::allows('manage.permissions'))
		{
			$permissions = Permission::paginate(10);

			return view('admin.permissions.index', [
				'permissions' => $permissions
			]);
		}

        return redirect('/home');
    }

    public function create()
    {
        if (Gate::allows('create.permissions'))
		{
			return view('admin.permissions.create');
		}

        return redirect('/home');
    }

    public function store(StorePermission $request)
    {
        if (Gate::allows('create.permissions'))
		{
			$permission = new Permission();

			$permission->name = $request->name;
			$permission->slug = $request->slug;
			$permission->is_active = $request->is_active ? 1 : 0;

			$permission->save();

			return redirect()->route('admin.permissions.index');
		}

        return redirect('/home');
    }

    public function edit(Permission $permission)
    {
        if (Gate::allows('edit.permissions'))
		{
			return view('admin.permissions.edit', [
				'permission' => $permission
			]);
		}

        return redirect('/home');
    }

    public function update(UpdatePermission $request, Permission $permission)
    {
        if (Gate::allows('edit.permissions'))
		{
			if (!$permission->is_protected)
			{
				$permission->name = $request->name;
				$permission->slug = $request->slug;
				$permission->is_active = $request->is_active ? 1 : 0;

				$permission->save();
			}

			return redirect()->route('admin.permissions.index');
		}

        return redirect('/home');
    }

    public function destroy(Permission $permission)
    {
        if (Gate::allows('delete.permissions'))
		{
			if (!$permission->is_protected)
			{
				$permission->delete();

				return redirect()->back();
			}
		}

		return redirect('/home');
    }
}
