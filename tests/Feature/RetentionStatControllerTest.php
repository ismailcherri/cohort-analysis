<?php

namespace Tests\Feature;

use App\RetentionStat;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class RetentionStatControllerTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Test retention stat controller index
     *
     * @return void
     */
    public function testRetentionStatControllerIndex()
    {
        $retentionStat1 = factory(RetentionStat::class)->create();
        $retentionStat2 = factory(RetentionStat::class)->create();
        $retentionStat3 = factory(RetentionStat::class)->create();

        $response = $this->get('/api/retention-stats');


        $response
            ->assertStatus(200)
            ->assertJson([
                [
                    'user_id' => $retentionStat1->user_id
                ],
                [
                    'user_id' => $retentionStat2->user_id
                ],
                [
                    'user_id' => $retentionStat3->user_id
                ],
            ])
        ;

    }

    public function testRetentionStatControllerShow(){
        $retentionStat = factory(RetentionStat::class)->create();
        $dbRetentionStat = RetentionStat::where('user_id', $retentionStat->user_id)->first();

        $response = $this->get('/api/retention-stats/' . $dbRetentionStat->id);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'id',
                'user_id',
                'created_at',
                'onboarding_percentage',
                'count_applications',
                'count_accepted_applications'
            ])
            ->assertJson([
                'user_id' => $retentionStat->user_id
            ])
        ;
    }

    public function testRetentionControllerWeeklyCohorts(){
        $this->seed(\RetentionStatsTableSeeder::class);

        $response = $this->get('/api/retention-stats/weekly-cohorts');
        $weeklyCohorts = json_decode($response->getContent(), true);
        $first = reset($weeklyCohorts);

        $response->assertStatus(200);

        $this->assertIsArray($weeklyCohorts);
        $this->assertNotEmpty($weeklyCohorts);
        $this->assertArrayHasKey('name', $first);
        $this->assertArrayHasKey('data', $first);
        $this->assertNotEmpty($first['data']);
        $this->assertIsString($first['name']);
    }
}
