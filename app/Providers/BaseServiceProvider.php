<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BaseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
         $this->loadViewsFrom(resource_path('views/vendor/adminlte'), 'adminlte');

         /**
         * Seccion de alias para las vistas de la app
         */
         $this->loadViewsFrom(resource_path('views/vendor/clinica/admin'), 'admin');
         $this->loadViewsFrom(resource_path('views/vendor/clinica/fichaje'), 'fichaje');
         $this->loadViewsFrom(resource_path('views/vendor/clinica/hclinica'), 'hclinica');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
