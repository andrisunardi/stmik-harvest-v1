<?php

namespace Tests\Feature\Livewire\CMS;

use App\Http\Livewire\CMS\MySalaryComponent;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class MySalaryTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase, WithFaker;

    public function test_index()
    {
        $response = $this->get(route('cms.my-salary.index'));
        $response->assertStatus(302);

        $response = $this->actingAs($this->auth)->get(route('cms.my-salary.index'));
        $response->assertStatus(200);
        $response->assertSeeLivewire(MySalaryComponent::class);

        Livewire::actingAs($this->auth)->test(MySalaryComponent::class)
            ->assertDontSee('custom.')
            ->assertDontSee('index.')
            ->assertDontSee('validation.')
            ->assertHasNoErrors()
            ->assertStatus(200);
    }
}
