<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BasicGoClassTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test welcome page loads successfully.
     */
    public function test_welcome_page_loads(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertInertia(fn ($assert) => $assert
            ->component('welcome')
        );
    }

    /**
     * Test health check endpoint works.
     */
    public function test_health_check_works(): void
    {
        $response = $this->get('/health-check');
        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'ok'
        ]);
    }
}