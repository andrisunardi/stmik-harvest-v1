<?php

namespace Tests\Feature\Livewire\CMS;

use App\Http\Livewire\CMS\LoginComponent;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase, WithFaker;

    public function test_index()
    {
        Livewire::actingAs($this->admin)
            ->test(LoginComponent::class)
            ->assertStatus(200);
    }
}
