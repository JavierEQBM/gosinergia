<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        if(Schema::hasTable('users')) {
            $config = \App\Config::where('config', 'autologin')->get()->first();

            if(!is_null($config)) {
                if(boolval($config->value1)) {
                    $user = \App\User::find($config->value2);

                    if(!is_null($user)) {
                        auth()->login($user);
                    }
                }
            }
        }
    }
}
