<?php

namespace App\Providers;

use App\User;
use App\Assessment;
use App\Task;
use App\Policies\UserPolicy;
use App\Policies\AssessmentPolicy;
use App\Policies\TaskPolicy;
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
        'App\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class,
        Assessment::class => AssessmentPolicy::class,
        Task::class => TaskPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdmin', function ($user) {
            return $user->role=='admin';
        });

        Gate::define('isUser', function ($user) {
            return $user->role=='user';
        });
    }
}
