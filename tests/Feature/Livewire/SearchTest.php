<?php

namespace Tests\Feature;


use App\Http\Livewire\SearchComponent;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SearchTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase, WithFaker;

    public function test_index()
    {
        Livewire::test(SearchComponent::class)
            ->assertDontSee("validation.")
            ->assertStatus(200);
    }
}
