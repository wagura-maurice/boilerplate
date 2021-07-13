<?php

namespace App\Console\Commands;

use App\Models\ErrorLog;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class Seed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed the app\'s main database tables';

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
            // logic for running though Orangehill's Iseed commands.
            Artisan::call('iseed settings,roles,permissions,permission_role,users,role_user --force');

        } catch (\Throwable $th) {
            // throw $th;
            ErrorLog::create([
                'title'       => 'ERROR: ' . get_class($this),
                '_class'      => get_class($this),
                'description' => strtoupper($this->description) . ': \n' . 'ERROR MESSAGE: ' . $th->getMessage(),
            ]);
        }

        return 'App\'s main database tables have been seeded, successfully';
    }
}
