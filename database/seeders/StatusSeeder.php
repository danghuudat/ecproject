<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Flynsarmy\CsvSeeder\CsvSeeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends CsvSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function __construct(){
        $this->table = 'statuses';
        $this->filename = base_path().'\database\seeders\csvs\seeder_status.csv';
        $this->insert_chunk_size = 1;

        $this->offset_rows = 1;

        $this->timestamps = false;

        $this->mapping = [0 =>'id',1=>'name'];
        $this->insert_chunk_size = 1;

        $this->offset_rows = 1;

        $this->timestamps = false;
    }

    public function run()
    {
        DB::disableQueryLog();
        DB::table($this->table)->truncate();
        parent::run();
    }
}
