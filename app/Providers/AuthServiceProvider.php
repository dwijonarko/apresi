<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdmin', function($user) {
            return $user->role->name == 'Administrator';
         });

         Gate::define('isOperator', function($user) {
             return $user->role->name == 'Operator';
         });
         Gate::define('isRegistered', function($user) {
             return $user->role->name == 'Registered';
         });
         Gate::define('update-profile', function ($user,$id) {
             return $id==\Auth::user()->id;
         });
    }
}
