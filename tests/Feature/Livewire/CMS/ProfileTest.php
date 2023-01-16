<?php

namespace Tests\Feature\Livewire\CMS;

use App\Http\Livewire\CMS\ProfileChangePasswordComponent;
use App\Http\Livewire\CMS\ProfileComponent;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase, WithFaker;

    public function test_index()
    {
        $response = $this->get(route('cms.profile.index'));
        $response->assertStatus(302);

        $response = $this->actingAs($this->auth)->get(route('cms.profile.index'));
        $response->assertStatus(200);
        $response->assertSeeLivewire(ProfileComponent::class);

        Livewire::test(ProfileComponent::class)
            ->assertDontSee('custom.')
            ->assertDontSee('index.')
            ->assertDontSee('validation.')
            ->assertHasNoErrors()
            ->assertStatus(200);
    }

    public function test_change_password()
    {
        $response = $this->get(route('cms.profile.change-password'));
        $response->assertStatus(302);

        $response = $this->actingAs($this->auth)->get(route('cms.profile.change-password'));
        $response->assertStatus(200);
        $response->assertSeeLivewire(ProfileChangePasswordComponent::class);

        Livewire::test(ProfileChangePasswordComponent::class)
            ->assertDontSee('custom.')
            ->assertDontSee('index.')
            ->assertDontSee('validation.')
            ->assertHasNoErrors()
            ->assertStatus(200);
    }
}
