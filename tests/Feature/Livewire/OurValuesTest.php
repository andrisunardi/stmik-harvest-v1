<?php

namespace Tests\Feature;

use App\Http\Livewire\OurValuesComponent;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class OurValuesTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase, WithFaker;

    public $menu_name = "Our Values";
    public $menu_icon = "fas fa-home";
    public $menu_slug = "home";
    public $menu_table = "home";
    public $menu_type = "index";

    public function test_index()
    {
        $response = $this->get(route("{$this->menu_slug}.index"));
        $response->assertStatus(200);
        $response->assertSeeLivewire(OurValuesComponent::class);

        Livewire::test(OurValuesComponent::class)
            ->assertDontSee("custom.")
            ->assertDontSee("index.")
            ->assertDontSee("message.")
            ->assertDontSee("page.")
            ->assertDontSee("validation.")
            ->assertStatus(200);
    }
}
