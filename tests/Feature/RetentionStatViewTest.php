<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Passport\Passport;
use Tests\TestCase;

class RetentionStatViewTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRetentionStatsPage()
    {
        Passport::actingAs(
            factory(User::class)->create(),
            ['create-servers']
        );
        $response = $this->get('/retention-stats');

        $response->assertStatus(200);
        $response->assertSee('Retention');
    }
}
