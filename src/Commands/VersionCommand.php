<?php

namespace Bantenprov\Advancetrust\Commands;

use Illuminate\Console\Command;
use File;
class VersionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'advancetrust:version';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check version';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

       
    protected function getComposerVal()
    {
      $composer = json_decode(File::get(base_path('composer.json')),true);
      return $composer['require']['bantenprov/advancetrust'];
    }
  
    /**
     * Execute the console command.
     *
     * @return mixed
     */ 

    public function handle()
    {   
        $version = $this->getComposerVal();      
        $this->info('Advance trust.');
        $this->info('=================');
        $this->info('Author : Bantenprov');       
        $this->info('Support Laravel > 5.4.* ');
        $this->info('Version : '.$version);
        $this->info('=================');
    }
}
