<?php

namespace Tests\Feature\API;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class HomeTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase;

    public function test_index()
    {
        $response = $this->get(route("api.index"));
        $response->assertStatus(200);
    }
}
