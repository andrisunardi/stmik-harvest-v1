<?php

namespace Tests\Feature;


use App\Http\Livewire\ServiceComponent;
use App\Http\Livewire\ServiceViewComponent;
use App\Models\Service;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase, WithFaker;

    public function test_index()
    {
        Livewire::test(ServiceComponent::class)
            ->assertDontSee("validation.")
            ->assertStatus(200);
    }

    public function test_view()
    {
        $service = Service::factory()->create(["active" => true]);

        Livewire::test(ServiceViewComponent::class, ["service_slug" => $service->slug])
            ->assertSee($service->name)
            ->assertDontSee("validation.")
            ->assertStatus(200);
    }
}
