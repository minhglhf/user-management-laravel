<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\UserPolicy;
use App\PostUser;
use App\User;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         //'App\Model' => 'App\Policies\ModelPolicy',
        \App\User::class => \App\Policies\UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('view-user', function ($user) {
            return $user->role != 3;
        });

        Gate::define('create-user', function ($user) {
            return $user->role != 3;
        });

        Gate::define('delete-user', function ($user) {
            return $user->role != 3;
        });

        Gate::define('restore-user', function ($user) {
            return $user->role != 3;
        });

        Gate::define('edit-user', function ($user) {
            return $user->role != 3;
        });

        Gate::define('edit-lower-role', function ($user, $post) {
            return $user->role < $post->role;
        });

        Gate::define('delete-lower-user', function ($user, $post) {
            return $user->role < $post;
        });
    }
}
