<?php

namespace Tests\Feature;


use App\Http\Livewire\AboutUsComponent;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AboutUsTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase, WithFaker;

    public function test_index()
    {
        Livewire::test(AboutUsComponent::class)
            ->assertDontSee("validation.")
            ->assertStatus(200);
    }
}
