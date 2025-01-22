<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Console\PromptsForMissingInput;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

use function Laravel\Prompts\pause;
use function Laravel\Prompts\search;

class AppMakeService extends Command implements PromptsForMissingInput
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make-service {name : name of service} {--O|observer : generate observer is optional }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new services for given specific model';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        pause('Press ENTER to continue.');
        $name = $this->argument('name');
        $observer = $this->option('observer');

        $modelTableName = Str::snake(Str::plural((string) $name));

        // step 1 - make store request
        $this::callSilent('schema:generate-rules', [
            'table' => $modelTableName,
            '--create-request' => true,
            '--file' => $name.'\\'.$name.'StoreRequest',
        ]);
        $this->components->info('  Request [app/Http/Requests/'.$name.'/'.$name.'StoreRequest.php'.'] created successfully.');

        // step 2 - make update request
        $this::callSilent('schema:generate-rules', [
            'table' => $modelTableName,
            '--create-request' => true,
            '--file' => $name.'\\'.$name.'UpdateRequest',
        ]);
        $this->components->info('  Request [app/Http/Requests/'.$name.'/'.$name.'UpdateRequest.php'.'] created successfully.');

        // step 3 - make api controller
        $this::call('make:controller', [
            'name' => $name.'/'.$name.'Controller',
            '--model' => $name,
        ]);

        // step 4 - make service
        $this::call('make:service', [
            'name' => $name.'/'.$name.'Service',
            '--methods' => 'index,store,update,destroy',
        ]);

        if ($observer) {
            // step 5 - make observer
            $this->call('make:observer', [
                'name' => $name.'/'.$name.'Observer',
                '--model' => $name,
            ]);
        }

        $this->call('app:clean');
        $this->components->info('  Successfull Generated `'.$name.'` services');
    }

        /**
     * Prompt for missing input arguments using the returned questions.
     *
     * @return array
     */
    protected function promptForMissingArgumentsUsing()
    {
        $this->newLine();
        $this->line('  -------------------------');
        $this->line('  Laravel Service Generator');
        $this->line('  -------------------------');
        $this->newLine();
        $modelsDirectory = app_path('Models');
        $files = File::allFiles($modelsDirectory);
        $modelNames = array_map(function ($file) {
            return pathinfo($file, PATHINFO_FILENAME);
        }, $files);

        return [
            'name' => fn () => search(
                label: 'Search for a model:',
                placeholder: 'E.g. User',
                options: fn ($value) => strlen($value) > 0
                    ? array_values(array_filter($modelNames, function ($modelName) use ($value) {
                        return strpos($modelName, $value) !== false;
                    }))
                    : []
            ),
        ];
    }
}
