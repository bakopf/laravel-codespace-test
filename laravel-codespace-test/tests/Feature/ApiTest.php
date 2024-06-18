<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_it_can_access_get_posts_route(): void
    {
        $response = $this->get('/api/posts');

        $response->assertStatus(200);
    }

    /**
     * A basic test example.
     */
    public function test_it_can_access_get_post_by_id_route(): void
    {
        $response = $this->get('/api/posts/1');

        $response->assertStatus(200);
    }

    /**
     * A basic test example.
     */
    public function test_it_can_access_get_posts_by_author_route(): void
    {
        $response = $this->get('/api/posts/author/john_doe');

        $response->assertStatus(200);
    }

    public function test_it_can_access_get_posts_route_and_has_correct_structure(): void
    {
        // Send a GET request to the specified API endpoint
        $response = $this->getJson('/api/posts');

        // Assert that the response status is 200 (OK)
        $response->assertStatus(200);

        // Assert that the response contains actual data
        $response->assertJsonStructure([
            '*' => [
                'id',
                'author',
                'publish_date',
                'headline',
                'text',
                'created_at',
                'updated_at',
            ],
        ]);
        
    }
}
