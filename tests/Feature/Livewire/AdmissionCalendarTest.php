<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\AdmissionCalendarComponent;
use App\Models\AdmissionCalendar;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AdmissionCalendarTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase, WithFaker;

    public $menu_name = 'Admission Calendar';

    public $menu_icon = 'fas fa-calendar';

    public $menu_slug = 'admission-calendar';

    public $menu_table = 'admission_calendar';

    public $menu_type = 'index';

    public function test_index()
    {
        $admission_calendar = AdmissionCalendar::factory()->active()->create();

        $response = $this->get(route("{$this->menu_slug}.index"));
        $response->assertStatus(200);
        $response->assertSeeLivewire(AdmissionCalendarComponent::class);

        Livewire::test(AdmissionCalendarComponent::class)
            ->assertSee($admission_calendar->translate_name)
            ->assertSee($admission_calendar->translate_description)
            ->assertDontSee('custom.')
            ->assertDontSee('index.')
            ->assertDontSee('message.')
            ->assertDontSee('page.')
            ->assertDontSee('validation.')
            ->assertStatus(200);

        $this->assertTrue($admission_calendar->exists());
    }
}
