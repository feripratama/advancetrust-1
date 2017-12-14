<?php

namespace Bantenprov\Advancetrust\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use File;

class AdvanceTrustCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'advancetrust:add-route {prefix=home : Prefix route.}
                                                    {middleware=auth : Middleware.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add advancetrust to route';

    /**
     * Create a new command instance.
     *
     * @return void
     */

    protected $drip;

    public function __construct()
    {
        parent::__construct();
        
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */

    protected function content()
    {
        $prefix = $this->argument('prefix');
        $middleware = $this->argument('middleware');

        $replace_prefix = str_replace('[%_prefix%]',$prefix,File::get(__DIR__.'/../stubs/routes.stub'));

        $replace_middleware = str_replace('[%_middleware%]',$middleware,$replace_prefix);
        
        return $replace_middleware;
    }
    

    public function handle()
    {               
        $this->info('Route add success'); 
        File::append(base_path('routes/web.php'),"\n".$this->content());        
        File::append(base_path('routes/api.php'),"\n".File::get(__DIR__.'/../stubs/api.stub'));
    }
}
