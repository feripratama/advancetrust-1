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
    protected $description = 'Create controller';

    /**
     * Create a new command instance.
     *
     * @return void
     */    

    protected $stubsController = [                  
        'controllers' => [
            'PermissionController.stub',
            'RoleController.stub'
        ]                   
    ];

    

    public function __construct()
    {
        parent::__construct();
        
    }    

    protected function controllerViewCreate()
    {        
        
        foreach($this->stubsController['controllers'] as $stub)
        {
            File::put(base_path('app/Http/Controllers/').str_replace('stub','php',$stub),File::get(__DIR__.'/../stubs/Controllers/'.$stub));            
        }
        
    }
    

    public function handle()
    {                               
        $this->controllerViewCreate();
        $this->info('Create controller success');                  
    }
}
