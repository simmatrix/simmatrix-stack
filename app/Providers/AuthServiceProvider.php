<?php

namespace App\Providers;

use Laravel\Passport\Passport;
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
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // register the routes to issue/revoke access tokens, clients, personal access tokens
        Passport::routes();

        // By default, Passport issues long-lived access token that never expire, this is not encouraged as if someone managed to steal this token, they can do anything that they like, so we shorten the lifetime of these tokens
        Passport::tokensExpireIn(now() -> addMinutes(10));
        Passport::refreshTokensExpireIn(now() -> addDays(10));
    }
}
