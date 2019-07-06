<?php

namespace Tests\Unit;

use App\RetentionStat;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RetentionStatTest extends TestCase
{
    use RefreshDatabase;

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
}
