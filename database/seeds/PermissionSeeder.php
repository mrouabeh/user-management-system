<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//    	For permissions
        Permission::create([
        	'name' => 'manage permissions',
			'slug' => 'manage.permissions',
			'is_protected' => 1,
		]);
        Permission::create([
        	'name' => 'view permissions',
			'slug' => 'view.permissions',
			'is_protected' => 1,
		]);
        Permission::create([
        	'name' => 'create permissions',
			'slug' => 'create.permissions',
			'is_protected' => 1,
		]);
        Permission::create([
        	'name' => 'edit permissions',
			'slug' => 'edit.permissions',
			'is_protected' => 1,
		]);
        Permission::create([
        	'name' => 'delete permissions',
			'slug' => 'delete.permissions',
			'is_protected' => 1,
		]);


//        For roles
        Permission::create([
        	'name' => 'manage roles',
			'slug' => 'manage.roles',
			'is_protected' => 1,
		]);
        Permission::create([
        	'name' => 'view roles',
			'slug' => 'view.roles',
			'is_protected' => 1,
		]);
        Permission::create([
        	'name' => 'create roles',
			'slug' => 'create.roles',
			'is_protected' => 1,
		]);
        Permission::create([
        	'name' => 'edit roles',
			'slug' => 'edit.roles',
			'is_protected' => 1,
		]);
        Permission::create([
        	'name' => 'delete roles',
			'slug' => 'delete.roles',
			'is_protected' => 1,
		]);


//        For users
        Permission::create([
        	'name' => 'manage users',
			'slug' => 'manage.users',
			'is_protected' => 1,
		]);
		Permission::create([
			'name' => 'view users',
			'slug' => 'view.users',
			'is_protected' => 1,
		]);
        Permission::create([
        	'name' => 'create users',
			'slug' => 'create.users',
			'is_protected' => 1,
		]);
        Permission::create([
        	'name' => 'edit users',
			'slug' => 'edit.users',
			'is_protected' => 1,
		]);
        Permission::create([
        	'name' => 'delete users',
			'slug' => 'delete.users',
			'is_protected' => 1,
		]);
    }
}
