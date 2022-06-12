<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\AboutComponent;
use App\Models\Banner;
use App\Models\Value;
use App\Models\Network;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AboutTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase, WithFaker;

    public $menu_name = "About";
    public $menu_icon = "fas fa-home";
    public $menu_slug = "home";
    public $menu_table = "home";
    public $menu_type = "index";

    public function test_index()
    {
        $name = $this->faker->unique()->name();

        File::copy(
            public_path() . "/images/image.png",
            public_path() . "/images/banner/" . Str::slug($name) . ".png",
        );

        $banner = Banner::find(2);
        $banner->update([
            "name" => $name,
            "name_id" => $this->faker->name(),
            "description" => $this->faker->paragraph(),
            "description_id" => $this->faker->paragraph(),
            "image" => Str::slug($name) . ".png",
        ]);
        $banner->refresh();

        $value = Value::factory()->active()->create();
        $network = Network::factory()->active()->create();

        $response = $this->get(route("about.index"));
        $response->assertStatus(200);
        $response->assertSeeLivewire(AboutComponent::class);

        Livewire::test(AboutComponent::class)
            // ->assertSee($banner->translate_name)
            // ->assertSee($banner->translate_description)
            // ->assertSee($banner->image)
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

        $this->assertTrue($banner->exists());
        $this->assertTrue($value->exists());
        $this->assertTrue($network->exists());

        Storage::disk("images")->assertExists("banner/{$banner->image}");
        Storage::disk("images")->assertExists("network/{$network->image}");

        $banner->deleteImage();
        $network->deleteImage();
    }
}
