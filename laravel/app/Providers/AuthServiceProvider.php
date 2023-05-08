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
    private const CREATE = 2;
    private const READ = 3;
    private const UPDATE = 5;
    private const DELETE = 7;
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
        Gate::define('aboveAdmin', function(User $user){
            return($user->role_id <= 2);
        });

        //CRUD gate difinition
        Gate::define('Create', function (User $user){
            if((($user->CRUD) % self::CREATE)==0){return true;}
            return false;
        });
        Gate::define('Read', function (User $user){
            if((($user->CRUD) % self::READ)==0){return true;}
            return false;
        });
        Gate::define('Update', function (User $user){
            if((($user->CRUD) % self::UPDATE)==0){return true;}
            return false;
        });
        Gate::define('Delete', function (User $user){
            if((($user->CRUD) % self::DELETE)==0){return true;}
            return false;
        });
    }
}
