<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\TuitionFeesComponent;
use App\Models\TuitionFee;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class TuitionFeesTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase, WithFaker;

    public $menu_name = 'Tuition Fees';

    public $menu_icon = 'fas fa-money';

    public $menu_slug = 'tuition-fees';

    public $menu_table = 'tuition_fee';

    public $menu_type = 'index';

    public function test_index()
    {
        $tuition_fee = TuitionFee::factory()->active()->create();

        $response = $this->get(route("{$this->menu_slug}.index"));
        $response->assertStatus(200);
        $response->assertSeeLivewire(TuitionFeesComponent::class);

        Livewire::test(TuitionFeesComponent::class)
            ->assertSee($tuition_fee->translate_name)
            ->assertSee($tuition_fee->translate_description)
            ->assertDontSee('custom.')
            ->assertDontSee('index.')
            ->assertDontSee('message.')
            ->assertDontSee('page.')
            ->assertDontSee('validation.')
            ->assertStatus(200);

        $this->assertTrue($tuition_fee->exists());
    }
}
