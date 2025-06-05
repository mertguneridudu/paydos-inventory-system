<?php

namespace App\Providers;
use App\Models\User;


use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];


    public function boot()
    {
        $this->registerPolicies();

        Gate::define('viewLogViewer', function (?User $user) {
            // return true if the user is allowed access to the Log Viewer
        });
    }
}
