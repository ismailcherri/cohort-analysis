<?php

use JeroenZwart\CsvSeeder\CsvSeeder;

class RetentionStatsTableSeeder extends CsvSeeder
{

    public function __construct()
    {
        $this->file = '/database/seeds/csv/retention_stats.csv';
        $this->delimiter = ';';
        $this->timestamps = false;
        $this->defaults = [
            'onboarding_percentage' => 0 //This columns had a missing data in the CSV
        ];
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
