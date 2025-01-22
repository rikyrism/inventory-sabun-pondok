<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AppClean extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clean';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear cached config application';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->callSilent('config:cache');
        $this->callSilent('config:clear');
        $this->callSilent('cache:clear');
        $this->callSilent('view:cache');
        $this->callSilent('optimize');
        $this->call('app:log-clear');
        $this->components->info('Cached cleaned!');
    }
}
