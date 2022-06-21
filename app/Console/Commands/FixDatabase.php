<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class FixDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fix:database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fixing database problems';

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
     * @return void
     */
    public function handle()
    {
        try {
            $tables = DB::connection()->getDoctrineSchemaManager()->listTableNames();
            foreach ($tables as $table) {
                if (Schema::hasColumn($table, 'id')) {
                    $deleteData = 'DELETE FROM '.$table.' where id = 0';
                    DB::raw($deleteData);

                    $checkPrimary = DB::select('SHOW INDEXES FROM '.$table.' WHERE Key_name = \'PRIMARY\'');
                    if(count($checkPrimary) == 0) {
                        $sql = 'ALTER TABLE '.$table.' CHANGE COLUMN `id` ';
                        $sql .= '`id` INT UNSIGNED NOT NULL AUTO_INCREMENT, ADD PRIMARY KEY (`id`);';
                        DB::raw($sql);
                        $this->printMessage('PrimaryKey fixed for table : '.$table);
                    }
                }
            }
        } catch (\Exception $ex) {
            $this->printMessage($ex->getMessage(),'error');
        }
    }

    /**
     * @param $message
     * @param string $type
     */
    public function printMessage($message, string $type = 'line') {
        $this->{$type}($message);
    }
}
