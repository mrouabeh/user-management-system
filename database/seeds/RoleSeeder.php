<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Role::create(['name' => 'user']);
        $admin = Role::create(['name' => 'admin']);

//        Attach permissions to admin
		$admin->setPermission('manage.permissions');
		$admin->setPermission('view.permissions');
		$admin->setPermission('create.permissions');
		$admin->setPermission('edit.permissions');
		$admin->setPermission('delete.permissions');

		$admin->setPermission('manage.roles');
		$admin->setPermission('view.roles');
		$admin->setPermission('create.roles');
		$admin->setPermission('edit.roles');
		$admin->setPermission('delete.roles');

		$admin->setPermission('manage.users');
		$admin->setPermission('view.users');
		$admin->setPermission('create.users');
		$admin->setPermission('edit.users');
		$admin->setPermission('delete.users');
    }
}
