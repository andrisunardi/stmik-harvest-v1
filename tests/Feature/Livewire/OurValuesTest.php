<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\OurValuesComponent;
use App\Models\Value;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class OurValuesTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase, WithFaker;

    public $menu_name = "Our Values";
    public $menu_icon = "fas fa-building";
    public $menu_slug = "our-values";
    public $menu_table = "value";
    public $menu_type = "index";

    public function test_index()
    {
        $value = Value::factory()->active()->create();

        $response = $this->get(route("{$this->menu_slug}.index"));
        $response->assertStatus(200);
        $response->assertSeeLivewire(OurValuesComponent::class);

        Livewire::test(OurValuesComponent::class)
            ->assertSee($value->translate_name)
            ->assertSee($value->translate_description)
            ->assertDontSee("custom.")
            ->assertDontSee("index.")
            ->assertDontSee("message.")
            ->assertDontSee("page.")
            ->assertDontSee("validation.")
            ->assertStatus(200);

        $this->assertTrue($value->exists());
    }
}
