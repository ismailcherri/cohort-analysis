<?php

namespace Tests\Unit;

use App\RetentionStat;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Collection;
use Tests\TestCase;

class RetentionStatTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Create retention stat test
     *
     * @return void
     */
    public function testCreateRetentionStat()
    {
        $retentionStat = factory(RetentionStat::class)->create();

        $this->assertInstanceOf(RetentionStat::class, $retentionStat);
        $this->assertDatabaseHas('retention_stats', [
            'user_id' => $retentionStat->user_id
        ]);
    }

    public function testWeeklyCohortsRetentionStats(){
        $this->seed(\DatabaseSeeder::class);

        $weeklyCohorts = RetentionStat::getWeeklyCohorts();
        $first = $weeklyCohorts->first();

        $this->assertInstanceOf(Collection::class, $weeklyCohorts);
        $this->assertNotEmpty($weeklyCohorts);
        $this->assertArrayHasKey('name', $first);
        $this->assertArrayHasKey('data', $first);
        $this->assertIsString($first['name']);
        $this->assertInstanceOf(Collection::class, $first['data']);
        $this->assertNotEmpty($first['data']);
    }
}
