<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Role;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
        	'name' => 'Admin',
			'email' => 'admin@user-management-system.test',
			'email_verified_at' => now(),
			'password' => Hash::make('Password'),
			'remember_token' => Str::random(10)
		]);

        $admin->setRoles(['admin', 'user']);

		factory(User::class, 49)->create()->each(function($user) {
			$user->setRole('user');
		});
    }
}
