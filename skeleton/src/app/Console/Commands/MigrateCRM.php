<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MigrateCRM extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:migrate-c-r-m {--fresh : Drop all tables and re-run all migrations}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the database migrations for CRM';

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
                '--database' => 'db-crm',
                '--path' => 'database/migrations/crm',
            ]);
        } else {
            $this->call('migrate', [
                '--database' => 'db-crm',
                '--path' => 'database/migrations/crm',
            ]);
        }
    }
}
