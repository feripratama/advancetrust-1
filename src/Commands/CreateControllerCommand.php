<?php

namespace Bantenprov\Advancetrust\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use File;

class CreateControllerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'advancetrust:create-controller';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create controller, Middleware, Model';

    /**
     * Create a new command instance.
     *
     * @return void
     */    

    protected $stubsController = [                  
        'controllers' => [
            'PermissionController.stub',
            'RoleController.stub',
            'AccessControl.stub'
        ]                
    ];

    protected $stubsApiController = [                  
        'controllersapi' => [
            'PermissionApiController.stub',
            'RoleApiController.stub'
        ]                
    ];

    protected $stubsModel = [                  
        'models' => [
            'AccessControl.stub'
        ]                
    ];

    protected $stubsMiddleware = [                  
        'middlewares' => [
            'RoleMiddleware.stub'
        ]                
    ];

    protected $stubsMigration = [                  
        'migrations' => [
            '2017_12_22_154041_create_table_access_control.stub'
        ]                
    ];

    

    public function __construct()
    {
        parent::__construct();
        
    }

    protected function migrationCreate()
    {
        foreach($this->stubsMigration['migrations'] as $stub)
        {
            File::put(base_path('database/migrations/').str_replace('stub','php',$stub),File::get(__DIR__.'/../stubs/migrations/'.$stub));            
        }
    }    

    protected function controllerViewCreate()
    {        
        
        foreach($this->stubsController['controllers'] as $stub)
        {
            File::put(base_path('app/Http/Controllers/').str_replace('stub','php',$stub),File::get(__DIR__.'/../stubs/Controllers/'.$stub));            
        }
        
    }

    protected function modelCreate()
    {
        foreach($this->stubsModel['models'] as $stub)
        {
            File::put(base_path('app/Http/').str_replace('stub','php',$stub),File::get(__DIR__.'/../stubs/Models/'.$stub));            
        }
    }

    protected function middlewareCreate()
    {
        foreach($this->stubsMiddleware['middlewares'] as $stub)
        {
            File::put(base_path('app/Http/Middleware').str_replace('stub','php',$stub),File::get(__DIR__.'/../stubs/Middleware/'.$stub));            
        }
    }

    protected function controllerApiCreate()
    {        
        
        foreach($this->stubsApiController['controllersapi'] as $stub)
        {
            File::put(base_path('app/Http/Controllers/').str_replace('stub','php',$stub),File::get(__DIR__.'/../stubs/Controllers/api/'.$stub));            
        }
        
    }
    

    public function handle()
    {                   
        $this->controllerApiCreate();                  
        $this->controllerViewCreate();
        $this->middlewareCreate();
        $this->migrationCreate();
        $this->modelCreate();
        $this->info('Create controller success');                  
    }
}
