<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\ScholarshipsComponent;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ScholarshipsTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase, WithFaker;

    public $menu_name = 'Scholarships';

    public $menu_icon = 'fas fa-question';

    public $menu_slug = 'scholarships';

    public $menu_table = 'scholarship';

    public $menu_type = 'index';

    public function test_index()
    {
        $response = $this->get(route("{$this->menu_slug}.index"));
        $response->assertStatus(200);
        $response->assertSeeLivewire(ScholarshipsComponent::class);

        Livewire::test(ScholarshipsComponent::class)
            ->assertDontSee('custom.')
            ->assertDontSee('index.')
            ->assertDontSee('validation.')
            ->assertStatus(200);
    }
}
