<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        Gate::define('superAdmin', function (User $user) {
            return ($user->role_id === 1);
        });
        Gate::define('admin', function (User $user) {
            return ($user->role_id === 2);
        });
        Gate::define('merchant', function (User $user) {
            return ($user->role_id === 3);
        });
    }
}
