<?php

namespace App\Console\Commands;

use App\Models\ErrorLog;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class Clean extends Command
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
    protected $description = 'Clean / Optimize the App';

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
     * @return int
     */
    public function handle()
    {
        try {
            // logic for running laravel artisan commands.
            // Artisan::call('down');
            Artisan::call('cache:clear');
            Artisan::call('route:clear');
            Artisan::call('route:cache');
            Artisan::call('config:clear');
            Artisan::call('config:cache');
            Artisan::call('view:clear');
            Artisan::call('view:cache');
            Artisan::call('optimize');
            Artisan::call('up');
            // logic for running composer's commands.
            // shell_exec('composer dump-autoload');
            // shell_exec('composer update');
            shell_exec('composer dump-autoload');

        } catch (\Throwable $th) {
            // throw $th;
            ErrorLog::create([
                'title'       => 'ERROR: ' . get_class($this),
                '_class'      => get_class($this),
                'description' => strtoupper($this->description) . ': \n' . 'ERROR MESSAGE: ' . $th->getMessage(),
            ]);
        }

        return "App has been cleaned";
    }
}
