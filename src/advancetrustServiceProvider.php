<?php

namespace feripratama\advancetrust;

use Illuminate\Support\ServiceProvider;
use File;
use Log;

class advancetrustServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        if(!$this->app->routesAreCached()){
            require __DIR__.'/routes.php';
        }

        $this->loadViewsFrom(base_path('resources/views/'), 'advancetrust');      

        $this->publishes([
            __DIR__.'/Controllers' => app_path('Http/Controllers/'),
            //__DIR__.'/Views' => base_path('resources/views/advancetrust/')
        ],'advancetrust');
        

        $this->commands('feripratama\advancetrust\Commands\AdvanceTrustCommand');
        $this->commands('feripratama\advancetrust\Commands\VersionCommand');
        $this->commands('feripratama\advancetrust\Commands\CreateViewCommand');        
    }
    

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('feripratama\advancetrust\Controllers\AdvanceTrustController');
        $this->app->make('feripratama\advancetrust\Controllers\RoleController');        
        $this->app->make('feripratama\advancetrust\Controllers\PermissionController');

        $this->loadViewsFrom(__DIR__.'/Views', 'advancetrust');        
    }
}