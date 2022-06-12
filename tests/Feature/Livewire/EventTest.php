<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\EventComponent;
use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Livewire;
use Tests\TestCase;

class EventTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase, WithFaker;

    public $menu_name = "Event";
    public $menu_icon = "fas fa-calendar";
    public $menu_slug = "event";
    public $menu_table = "event";
    public $menu_type = "index";

    public function test_index()
    {
        $event_category = EventCategory::factory()->active()->create();
        $event = Event::factory()->active()->create([
            "event_category_id" => $event_category->id,
            "start" => now(),
            "end" => now(),
        ]);

        $response = $this->get(route("{$this->menu_slug}.index"));
        $response->assertStatus(200);
        $response->assertSeeLivewire(EventComponent::class);

        Livewire::test(EventComponent::class)
            ->assertSee($event_category->translate_name)
            ->assertSee($event->event_category->translate_name)
            ->assertSee($event->translate_name)
            ->assertSee(strip_tags(Str::limit($event->translate_description, 100)))
            ->assertSee(Carbon::parse($event->start)->format("d M Y H:i"))
            ->assertSee(Carbon::parse($event->end)->format("d M Y H:i"))
            ->assertSee($event->location)
            ->assertSee($event->image)
            ->assertSee($event->slug)
            ->assertDontSee("custom.")
            ->assertDontSee("index.")
            ->assertDontSee("message.")
            ->assertDontSee("page.")
            ->assertDontSee("validation.")
            ->assertStatus(200);

        $this->assertTrue($event->exists());

        Storage::disk("images")->assertExists("{$this->menu_slug}/{$event->image}");

        $event->deleteImage();
    }
}
