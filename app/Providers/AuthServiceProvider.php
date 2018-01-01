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

        // You can define your Gates over here. Gates are for actions that are not related to any models
        // Gate::define('update-post', function( $user, $post ) {
        //     return $user -> id == $post -> user_id;
        // });

        // Instead of the abovementioned way of creating Gates, you can use Resource Gates
        // Gate::resource('posts', 'PostPolicy');
        // Which basically translated to
        // Gate::define('posts.view', 'PostPolicy@view');
        // Gate::define('posts.create', 'PostPolicy@create');
        // Gate::define('posts.update', 'PostPolicy@update');
        // Gate::define('posts.delete', 'PostPolicy@delete');

        // To use Gates in your other controllers later, no need to pass in $user, it will be automatically injected
        // if ( Gate::allows('update-post', $post ) ) ...
        // if ( Gate::denies('update-post', $post ) ) ...
        // To use Policies in your other controllers later, no need to pass in $user too
        // if ( $user -> can('update-post', $post ) ) ...
        // if ( $user -> cant('update-post', $post ) ) ...
    }
}
