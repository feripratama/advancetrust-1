<?php

namespace Bantenprov\Advancetrust;

use Illuminate\Support\ServiceProvider;
use File;
use Log;

class AdvanceTrustServiceProvider extends ServiceProvider
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

        // $this->loadViewsFrom(base_path('resources/views/'), 'advancetrust');      
        $this->loadViewsFrom(__DIR__.'/Views/', 'advancetrust'); 
        // $this->publishes([
        //     __DIR__.'/Controllers' => app_path('Http/Controllers/')
        // ],'advancetrust');
        

        $this->commands('Bantenprov\Advancetrust\Commands\AdvanceTrustCommand');
        $this->commands('Bantenprov\Advancetrust\Commands\VersionCommand');
        $this->commands('Bantenprov\Advancetrust\Commands\CreateViewCommand'); 
        $this->commands('Bantenprov\Advancetrust\Commands\CreateControllerCommand'); 
               
    }
    

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Bantenprov\Advancetrust\Controllers\AdvanceTrustController');
        $this->app->make('Bantenprov\Advancetrust\Controllers\RoleController');        
        $this->app->make('Bantenprov\Advancetrust\Controllers\PermissionController');

        //$this->loadViewsFrom(__DIR__.'/Views', 'advancetrust');        
    }
}