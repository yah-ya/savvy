<?php

namespace App\Providers;

use App\Services\SMS\Kavenegar\Service;
use App\Services\SMS\SmsServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SmsServiceInterface::class,Service::class); // Set default sms service to kavenegar
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
