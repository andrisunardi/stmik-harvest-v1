<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\ProcedureComponent;
use App\Models\Procedure;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ProcedureTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase, WithFaker;

    public $menu_name = 'Procedure';

    public $menu_icon = 'fas fa-legal';

    public $menu_slug = 'procedure';

    public $menu_table = 'procedure';

    public $menu_type = 'index';

    public function test_index()
    {
        $procedure = Procedure::factory()->active()->create();

        $response = $this->get(route("{$this->menu_slug}.index"));
        $response->assertStatus(200);
        $response->assertSeeLivewire(ProcedureComponent::class);

        Livewire::test(ProcedureComponent::class)
            ->assertSee($procedure->translate_name)
            ->assertSee($procedure->translate_description)
            ->assertDontSee('custom.')
            ->assertDontSee('index.')
            ->assertDontSee('message.')
            ->assertDontSee('page.')
            ->assertDontSee('validation.')
            ->assertStatus(200);

        $this->assertTrue($procedure->exists());
    }
}
