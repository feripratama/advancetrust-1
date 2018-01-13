<?php

namespace Bantenprov\Advancetrust\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use File;

class CreateViewCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'advancetrust:create-view {extends=home : extend to }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create view interface';

    /**
     * Create a new command instance.
     *
     * @return void
     */

    protected $stubsRole = [                  
        'roles' => [
            'addpermission.blade.stub',
            'role.blade.stub',
            'rolecreate.blade.stub',
            'roleedit.blade.stub',
            'roleshow.blade.stub'
        ]                    
    ];

    protected $stubsPermission = [                  
        'permissions' => [
            'permission.blade.stub',
            'permissioncreate.blade.stub',
            'permissionedit.blade.stub',
            'permissionshow.blade.stub'
        ]                   
    ];

    protected $stubsAccess = [                  
        'access-controllers' => [
            'index.blade.stub',
            'show.blade.stub'
        ]                   
    ];

    

    public function __construct()
    {
        parent::__construct();        
    }


    protected function strReplaceRole($fileName)
    {
        $extend = $this->argument('extends');
        return str_replace('[%extend_to%]',$extend,File::get(__DIR__.'/../stubs/Views/roles/'.$fileName));
    }

    protected function strReplacePermission($fileName)
    {
        $extend = $this->argument('extends');
        return str_replace('[%extend_to%]',$extend,File::get(__DIR__.'/../stubs/Views/permissions/'.$fileName));
    }

    protected function roleViewCreate()
    {        

        foreach($this->stubsRole['roles'] as $stub)
        {
            File::put(base_path('resources/views/advancetrust/roles/').str_replace('stub','php',$stub),$this->strReplaceRole($stub));            
        }
        
    }

    protected function permissionViewCreate()
    {        

        foreach($this->stubsPermission['permissions'] as $stub)
        {
            File::put(base_path('resources/views/advancetrust/permissions/').str_replace('stub','php',$stub),$this->strReplacePermission($stub));            
        }
        
    }

    protected function accessViewCreate()
    {        

        foreach($this->stubsAccess['access-controlers'] as $stub)
        {
            File::put(base_path('resources/views/advancetrust/access-controller/').str_replace('stub','php',$stub),File::get(__DIR__.'/../stubs/Views/access-controller/'.$stub)); 
        }
        
    }

    protected function createMenu()
    {
        File::put(base_path('resources/views/advancetrust/menu/menu.blade.php'),File::get(__DIR__.'/../stubs/Views/menu/menu.blade.stub'));
    }

    public function handle()
    {                               
        File::makeDirectory(base_path('resources/views/advancetrust'));
        File::makeDirectory(base_path('resources/views/advancetrust/menu'));
        File::makeDirectory(base_path('resources/views/advancetrust/roles'));
        File::makeDirectory(base_path('resources/views/advancetrust/permissions'));
        File::makeDirectory(base_path('resources/views/advancetrust/access-controller'));
        $this->createMenu();
        $this->roleViewCreate();
        $this->permissionViewCreate();
        $this->accessViewCreate();
        $this->info('Create view success');
    }
}
