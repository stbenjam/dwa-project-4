<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Schema::defaultStringLength(191);

        view()->composer('*', function($view){
            $view_name = $view->getName();

            if(strpos($view_name, '.')) {
                $location = explode('.', $view->getName())[0];
            } else {
                $location = 'root';
            }

            view()->share('navbar_location', $location);
        });
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
