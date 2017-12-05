<?php

namespace Bantenprov\Advancetrust\Commands;

use Illuminate\Console\Command;

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

    /**
     * Execute the console command.
     *
     * @return mixed
     */    

    public function handle()
    {        
        $this->info('Advance trust.');
        $this->info('=================');
        $this->info('Author : Bantenprov');
        $this->info('Version : 1.0.0');       
        $this->info('Support Laravel > 5.4.* ');
        $this->info('=================');
    }
}
