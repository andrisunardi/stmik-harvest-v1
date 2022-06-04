<?php

namespace Tests\Feature;

use App\Http\Livewire\OnlineRegistrationComponent;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class OnlineRegistrationTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase, WithFaker;

    public $menu_name = "Online Registration";
    public $menu_icon = "fas fa-question";
    public $menu_slug = "online-registration";
    public $menu_table = "registration";
    public $menu_type = "index";

    public function test_index()
    {
        $response = $this->get(route("{$this->menu_slug}.index"));
        $response->assertStatus(200);
        $response->assertSeeLivewire(OnlineRegistrationComponent::class);

        Livewire::test(OnlineRegistrationComponent::class)
            ->assertDontSee("custom.")
            ->assertDontSee("index.")
            ->assertDontSee("message.")
            ->assertDontSee("page.")
            ->assertDontSee("validation.")
            ->assertStatus(200);
    }
}
