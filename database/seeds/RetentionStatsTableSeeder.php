<?php

use JeroenZwart\CsvSeeder\CsvSeeder;

class RetentionStatsTableSeeder extends CsvSeeder
{

    public function __construct()
    {
        $this->file = '/database/seeds/csv/retention_stats.csv';
        $this->delimiter = ';';
        $this->timestamps = false;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        parent::run();
    }
}
