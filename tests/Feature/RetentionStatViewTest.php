<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RetentionStatViewTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRetentionStatsPage()
    {
        $response = $this->get('/retention-stats');

        $response->assertStatus(200);
        $response->assertSee('Retention');
    }
}
