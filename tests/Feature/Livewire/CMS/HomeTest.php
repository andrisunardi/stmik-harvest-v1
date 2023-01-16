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
        $response = $this->get(route('cms.index'));
        $response->assertStatus(200);
        $response->assertSeeLivewire(HomeComponent::class);

        Livewire::test(HomeComponent::class)
            ->assertDontSee('custom.')
            ->assertDontSee('index.')
            ->assertDontSee('validation.')
            ->assertHasNoErrors()
            ->assertStatus(200);
    }

    public function test_already_login()
    {
        $response = $this->actingAs($this->auth)->get(route('cms.index'));
        $response->assertStatus(200);
        $response->assertSeeLivewire(HomeComponent::class);

        Livewire::actingAs($this->auth)
            ->test(HomeComponent::class)
            ->assertDontSee('custom.')
            ->assertDontSee('index.')
            ->assertDontSee('validation.')
            ->assertHasNoErrors()
            ->assertStatus(200);
    }
}
