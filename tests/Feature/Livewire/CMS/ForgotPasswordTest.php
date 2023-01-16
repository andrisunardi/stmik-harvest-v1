<?php

namespace Tests\Feature\Livewire\CMS;

use App\Http\Livewire\CMS\ForgotPasswordComponent;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ForgotPasswordTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase, WithFaker;

    public function test_index()
    {
        $response = $this->get(route('cms.forgot-password.index'));
        $response->assertStatus(200);
        $response->assertSeeLivewire(ForgotPasswordComponent::class);

        Livewire::test(ForgotPasswordComponent::class)
            ->assertDontSee('custom.')
            ->assertDontSee('index.')
            ->assertDontSee('validation.')
            ->assertHasNoErrors()
            ->assertStatus(200);
    }

    public function test_already_login()
    {
        $response = $this->actingAs($this->auth)->get(route('cms.forgot-password.index'));
        $response->assertStatus(302);

        Livewire::actingAs($this->auth)
            ->test(ForgotPasswordComponent::class)
            ->assertDontSee('custom.')
            ->assertDontSee('index.')
            ->assertDontSee('validation.')
            ->assertHasNoErrors()
            ->assertStatus(200);
    }
}
