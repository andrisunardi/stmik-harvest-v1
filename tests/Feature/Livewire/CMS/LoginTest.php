<?php

namespace Tests\Feature\Livewire\CMS;

use App\Http\Livewire\CMS\LoginComponent;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase, WithFaker;

    public function test_index()
    {
        $response = $this->get(route('cms.login.index'));
        $response->assertStatus(200);
        $response->assertSeeLivewire(LoginComponent::class);

        Livewire::test(LoginComponent::class)
            ->assertDontSee('custom.')
            ->assertDontSee('index.')
            ->assertDontSee('validation.')
            ->assertHasNoErrors()
            ->assertStatus(200);
    }

    public function test_already_login()
    {
        $response = $this->actingAs($this->auth)->get(route('cms.login.index'));
        $response->assertStatus(302);

        Livewire::actingAs($this->auth)
            ->test(LoginComponent::class)
            ->assertDontSee('custom.')
            ->assertDontSee('index.')
            ->assertDontSee('validation.')
            ->assertHasNoErrors()
            ->assertStatus(200);
    }
}
