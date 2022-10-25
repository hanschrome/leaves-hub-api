<?php

declare(strict_types=1);

namespace Tests\Feature\v1\ping;

use Tests\TestCase;

class PingTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/api/v1/ping');

        $response->assertStatus(200);
    }
}
