<?php

namespace Tests\Feature\Livewire\CMS;

use App\Http\Livewire\CMS\MyAbsentComponent;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class MyAbsentTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase, WithFaker;

    public function test_index()
    {
        $response = $this->get(route('cms.my-absent.index'));
        $response->assertStatus(302);

        $response = $this->actingAs($this->auth)->get(route('cms.my-absent.index'));
        $response->assertStatus(200);
        $response->assertSeeLivewire(MyAbsentComponent::class);

        Livewire::actingAs($this->auth)->test(MyAbsentComponent::class)
            ->assertDontSee('custom.')
            ->assertDontSee('index.')
            ->assertDontSee('validation.')
            ->assertHasNoErrors()
            ->assertStatus(200);
    }
}
