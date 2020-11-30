<?php

namespace App\Providers;

use App\Models\Country;
use App\Models\Team;
use App\Models\User;
use App\Policies\CountryPolicy;
use App\Policies\DashboardGate;
use App\Policies\Permission;
use App\Policies\TeamPolicy;
use Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
        Country::class => CountryPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $this->registerGates();
    }

    private function registerGates()
    {
        Gate::define(\App\Policies\Gates::CMS_VIEW_DASHBOARD, 'App\Policies\DashboardGate@view');
    }
}
