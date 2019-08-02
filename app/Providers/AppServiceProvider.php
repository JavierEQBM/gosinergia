<?php

namespace App\Providers;

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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(\Illuminate\Support\Facades\Schema::hasTable('users')) {
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
