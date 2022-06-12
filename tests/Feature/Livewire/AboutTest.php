<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\AboutComponent;
use App\Models\Network;
use App\Models\Value;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class AboutTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase, WithFaker;

    public $menu_name = "About";
    public $menu_icon = "fas fa-building";
    public $menu_slug = "about";
    public $menu_table = "about";
    public $menu_type = "index";

    public function test_index()
    {
        $value = Value::factory()->active()->create();
        $network = Network::factory()->active()->create();

        $response = $this->get(route("{$this->menu_slug}.index"));
        $response->assertStatus(200);
        $response->assertSeeLivewire(AboutComponent::class);

        Livewire::test(AboutComponent::class)
            ->assertSee($value->translate_name)
            ->assertSee($value->translate_description)
            ->assertSee($value->icon)
            ->assertSee($network->translate_name)
            ->assertSee($network->translate_description)
            ->assertSee($network->link)
            ->assertSee($network->image)
            ->assertDontSee("custom.")
            ->assertDontSee("index.")
            ->assertDontSee("message.")
            ->assertDontSee("page.")
            ->assertDontSee("validation.")
            ->assertStatus(200);

        $this->assertTrue($value->exists());
        $this->assertTrue($network->exists());

        Storage::disk("images")->assertExists("network/{$network->image}");

        $value->deleteImage();
        $network->deleteImage();
    }
}
