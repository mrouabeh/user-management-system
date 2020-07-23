<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\Admin\PermissionPolicy;
use App\Policies\Admin\RolePolicy;
use App\Policies\Admin\UserPolicy;
use App\User;
use App\Role;
use App\Permission;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
		Permission::class => PermissionPolicy::class,
		Role::class => RolePolicy::class,
		User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage.permissions', 'App\Policies\Admin\PermissionPolicy@manage');
        Gate::define('view.permissions', 'App\Policies\Admin\PermissionPolicy@view');
        Gate::define('create.permissions', 'App\Policies\Admin\PermissionPolicy@create');
        Gate::define('edit.permissions', 'App\Policies\Admin\PermissionPolicy@update');
        Gate::define('delete.permissions', 'App\Policies\Admin\PermissionPolicy@delete');

		Gate::define('manage.roles', 'App\Policies\Admin\PermissionPolicy@manage');
        Gate::define('view.roles', 'App\Policies\Admin\RolePolicy@view');
        Gate::define('create.roles', 'App\Policies\Admin\RolePolicy@create');
        Gate::define('edit.roles', 'App\Policies\Admin\RolePolicy@update');
        Gate::define('delete.roles', 'App\Policies\Admin\RolePolicy@delete');

		Gate::define('manage.users', 'App\Policies\Admin\PermissionPolicy@manage');
        Gate::define('view.users', 'App\Policies\Admin\UserPolicy@view');
        Gate::define('create.users', 'App\Policies\Admin\UserPolicy@create');
        Gate::define('edit.users', 'App\Policies\Admin\UserPolicy@update');
        Gate::define('delete.users', 'App\Policies\Admin\UserPolicy@delete');
    }
}
