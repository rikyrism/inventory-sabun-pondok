<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AppLogClear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:log-clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear logs file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $files = Arr::where(Storage::disk('log')->files(), function ($filename) {
            return Str::endsWith($filename, '.log');
        });

        $count = count($files);

        if (Storage::disk('log')->delete($files)) {
            $this->components->info(sprintf('Deleted %s %s!', $count, Str::plural('log file', $count)));
            \Log::info('LOG WAS CLEAR');
        } else {
            $this->components->error('Error in deleting log files!');
        }
    }
}
