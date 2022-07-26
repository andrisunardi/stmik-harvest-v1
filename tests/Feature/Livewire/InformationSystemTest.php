<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\InformationSystemComponent;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class InformationSystemTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase, WithFaker;

    public $menu_name = 'Information System';

    public $menu_icon = 'fas fa-question';

    public $menu_slug = 'information-system';

    public $menu_table = 'information_system';

    public $menu_type = 'index';

    public function test_index()
    {
        $response = $this->get(route("{$this->menu_slug}.index"));
        $response->assertStatus(200);
        $response->assertSeeLivewire(InformationSystemComponent::class);

        Livewire::test(InformationSystemComponent::class)
            ->assertDontSee('custom.')
            ->assertDontSee('index.')
            ->assertDontSee('message.')
            ->assertDontSee('page.')
            ->assertDontSee('validation.')
            ->assertStatus(200);
    }
}
