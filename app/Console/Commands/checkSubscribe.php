<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class checkSubscribe extends Command
{
    protected $signature = 'check:subscribtion {userId?}';

    protected $description = 'Check subsribtion';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        while(1)
        {
            echo ("Start checking subsribtion \n\r" );
            if(!empty($this->argument('userId'))){
                echo 'checking ' . $this->argument('userId') . 'successifly';
            }
            echo  ("End subscribtion  \n\r");
            sleep(5);
        }
    }
}
