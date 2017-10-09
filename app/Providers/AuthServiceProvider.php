<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Policies\CommentPolicy;
use App\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => CommentPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate::define('create-comment', function ($user) {
        //     return $user->id != 2 && $user->id != 4;
        // });

        Gate::define('comment-create', 'App\Policies\CommentPolicy@create');

        Gate::define('post-update', 'App\Policies\PostPolicy@update');
        Gate::define('post-delete', 'App\Policies\PostPolicy@delete');

    }
}
