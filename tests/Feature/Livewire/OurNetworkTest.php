<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\OurNetworkComponent;
use App\Models\Network;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class OurNetworkTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase, WithFaker;

    public $menu_name = 'Our Network';

    public $menu_icon = 'fas fa-building';

    public $menu_slug = 'our-network';

    public $menu_table = 'network';

    public $menu_type = 'index';

    public function test_index()
    {
        $network = Network::factory()->active()->create();

        $response = $this->get(route("{$this->menu_slug}.index"));
        $response->assertStatus(200);
        $response->assertSeeLivewire(OurNetworkComponent::class);

        Livewire::test(OurNetworkComponent::class)
            ->assertSee($network->translate_name)
            ->assertSee($network->translate_description)
            ->assertSee($network->link)
            ->assertSee($network->image)
            ->assertDontSee('custom.')
            ->assertDontSee('index.')
            ->assertDontSee('message.')
            ->assertDontSee('page.')
            ->assertDontSee('validation.')
            ->assertStatus(200);

        $this->assertTrue($network->exists());

        Storage::disk('images')->assertExists("network/{$network->image}");

        $network->deleteImage();
    }
}
