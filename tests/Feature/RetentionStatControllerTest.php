<?php

namespace Tests\Feature;

use App\RetentionStat;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RetentionStatControllerTest extends TestCase
{
    use RefreshDatabase;

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
}
