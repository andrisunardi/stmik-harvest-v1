<?php

namespace Tests\Feature\Livewire\CMS;

use App\Http\Livewire\CMS\HomeComponent;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class HomeTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase, WithFaker;

    public function test_index()
    {
        Livewire::actingAs($this->admin)
            ->test(HomeComponent::class)
            ->assertStatus(200);
    }
}
