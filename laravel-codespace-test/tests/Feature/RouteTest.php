<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_it_can_access_frontpage_route(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200)
                ->assertSee('Front Page');
    }

    /**
     * A basic test example.
     */
    public function test_it_can_access_post_show_route(): void
    {
        $response = $this->get('/blog/1'); // Assuming '1' is a valid post ID

        $response->assertStatus(200);
    }

    /**
     * A basic test example.
     */
    public function test_it_can_access_privacy_route(): void
    {
        $response = $this->get('/privacy');

        $response->assertStatus(200);
    }

    /**
     * A basic test example.
     */
    public function test_it_can_access_imprint_route(): void
    {
        $response = $this->get('/imprint');

        $response->assertStatus(200);
    }

    /**
     * A basic test example.
     */
    public function test_it_can_access_contact_route(): void
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);
    }

    /**
     * A basic test example.
     */
    public function test_it_can_access_contact_entries_index_route(): void
    {
        $response = $this->get('/contact-entries');

        $response->assertStatus(200);
    }
}
