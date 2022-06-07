<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\FaqComponent;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class FaqTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase, WithFaker;

    public $menu_name = "Faq";
    public $menu_icon = "fas fa-question";
    public $menu_slug = "faq";
    public $menu_table = "faq";
    public $menu_type = "index";

    public function test_index()
    {
        $response = $this->get(route("{$this->menu_slug}.index"));
        $response->assertStatus(200);
        $response->assertSeeLivewire(FaqComponent::class);

        Livewire::test(FaqComponent::class)
            ->assertDontSee("custom.")
            ->assertDontSee("index.")
            ->assertDontSee("message.")
            ->assertDontSee("page.")
            ->assertDontSee("validation.")
            ->assertStatus(200);
    }
}
