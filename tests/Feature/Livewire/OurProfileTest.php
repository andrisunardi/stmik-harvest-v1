<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\OurProfileComponent;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class OurProfileTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase, WithFaker;

    public $menu_name = 'Our Profile';

    public $menu_icon = 'fas fa-building';

    public $menu_slug = 'our-profile';

    public $menu_table = 'our_profile';

    public $menu_type = 'index';

    public function test_index()
    {
        $response = $this->get(route("{$this->menu_slug}.index"));
        $response->assertStatus(200);
        $response->assertSeeLivewire(OurProfileComponent::class);

        Livewire::test(OurProfileComponent::class)
            ->assertDontSee('custom.')
            ->assertDontSee('index.')
            ->assertDontSee('message.')
            ->assertDontSee('page.')
            ->assertDontSee('validation.')
            ->assertStatus(200);
    }
}
