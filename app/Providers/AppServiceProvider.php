<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Horizon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ( env('HORIZON_ENABLE_EMAIL_NOTIFICATION') ) Horizon::routeMailNotificationsTo('example@example.com');
        if ( env('HORIZON_ENABLE_SLACK_NOTIFICATION') ) Horizon::routeSlackNotificationsTo('slack-webhook-url', '#channel');
        if ( env('HORIZON_ENABLE_SMS_NOTIFICATION') ) Horizon::routeSmsNotificationsTo('01123456789');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
