<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\FaqComponent;
use App\Models\Faq;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class FaqTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase, WithFaker;

    public $menu_name = 'Faq';

    public $menu_icon = 'fas fa-question';

    public $menu_slug = 'faq';

    public $menu_table = 'faq';

    public $menu_type = 'index';

    public function test_index()
    {
        $faq = Faq::factory()->active()->create();

        $response = $this->get(route("{$this->menu_slug}.index"));
        $response->assertStatus(200);
        $response->assertSeeLivewire(FaqComponent::class);

        Livewire::test(FaqComponent::class)
            ->assertSee($faq->translate_name)
            ->assertSee($faq->translate_description)
            ->assertDontSee('custom.')
            ->assertDontSee('index.')
            ->assertDontSee('validation.')
            ->assertStatus(200);

        $this->assertTrue($faq->exists());
    }
}
