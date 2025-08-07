<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MigrateIMPORTADOR extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:migrate-i-m-p-o-r-t-a-d-o-r {--fresh : Drop all tables and re-run all migrations}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the database migrations for IMPORTADOR';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $fresh = $this->option('fresh');

        if ($fresh) {
            $this->call('migrate:fresh', [
                '--database' => 'db-importador',
                '--path' => 'database/migrations/importador',
            ]);
        } else {
            $this->call('migrate', [
                '--database' => 'db-importador',
                '--path' => 'database/migrations/importador',
            ]);
        }
    }
}
