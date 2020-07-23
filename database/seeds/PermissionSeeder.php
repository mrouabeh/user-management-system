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
        	'name' => 'view permissions',
			'slug' => 'view.permissions',
		]);
        Permission::create([
        	'name' => 'create permissions',
			'slug' => 'create.permissions',
		]);
        Permission::create([
        	'name' => 'edit permissions',
			'slug' => 'edit.permissions',
		]);
        Permission::create([
        	'name' => 'delete permissions',
			'slug' => 'delete.permissions',
		]);


//        For roles
        Permission::create([
        	'name' => 'view roles',
			'slug' => 'view.roles',
		]);
        Permission::create([
        	'name' => 'create roles',
			'slug' => 'create.roles',
		]);
        Permission::create([
        	'name' => 'edit roles',
			'slug' => 'edit.roles',
		]);
        Permission::create([
        	'name' => 'delete roles',
			'slug' => 'delete.roles',
		]);


//        For users
        Permission::create([
        	'name' => 'view users',
			'slug' => 'view.users',
		]);
        Permission::create([
        	'name' => 'create users',
			'slug' => 'create.users',
		]);
        Permission::create([
        	'name' => 'edit users',
			'slug' => 'edit.users',
		]);
        Permission::create([
        	'name' => 'delete users',
			'slug' => 'delete.users',
		]);
    }
}
