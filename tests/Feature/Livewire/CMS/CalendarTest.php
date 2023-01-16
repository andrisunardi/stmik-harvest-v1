<?php

namespace Tests\Feature\Livewire\CMS;

use App\Http\Livewire\CMS\CalendarComponent;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CalendarTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase, WithFaker;

    public function test_index()
    {
        $response = $this->get(route('cms.calendar.index'));
        $response->assertStatus(302);

        $response = $this->actingAs($this->auth)->get(route('cms.calendar.index'));
        $response->assertStatus(200);
        $response->assertSeeLivewire(CalendarComponent::class);

        Livewire::actingAs($this->auth)->test(CalendarComponent::class)
            ->assertDontSee('custom.')
            ->assertDontSee('index.')
            ->assertDontSee('validation.')
            ->assertHasNoErrors()
            ->assertStatus(200);
    }
}
