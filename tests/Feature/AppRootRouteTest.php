<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AppRootRouteTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function testAppRootPathResponse(): void
    {
        $response = $this->get('/');

        $response->assertStatus(302)
            ?->assertRedirectToRoute('tickets.new');
    }
}
