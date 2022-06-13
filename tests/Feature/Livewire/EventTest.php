<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\EventComponent;
use App\Http\Livewire\EventViewComponent;
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

    public function test_category()
    {
        $event_category = EventCategory::factory()->active()->create();
        $events = Event::factory()->active()->count(3)->create([
            "event_category_id" => $event_category->id,
            "start" => now(),
            "end" => now(),
        ]);

        $event_category_other = EventCategory::factory()->active()->create();
        $event_other = Event::factory()->active()->create([
            "event_category_id" => $event_category_other->id,
            "start" => now()->subDay(),
            "end" => now()->subDay(),
        ]);

        $response = $this->get(route("{$this->menu_slug}.index") . "?category={$this->faker->slug()}");
        $response->assertStatus(302);

        $response = $this->get(route("{$this->menu_slug}.index") . "?category={$event_category->slug}");
        $response->assertStatus(200);
        $response->assertSeeLivewire(EventComponent::class);

        Livewire::withQueryParams(["category" => $event_category->slug])
            ->test(EventComponent::class, ["category" => $event_category->slug])
            ->assertSet("category", $event_category->slug)
            ->assertSee($event_category->translate_name)
            ->assertSee($event_category->translate_description)
            ->assertSee($events[0]->translate_name)
            ->assertSee(strip_tags(Str::limit($events[0]->translate_description, 100)))
            ->assertSee(Carbon::parse($events[0]->start)->format("d M Y H:i"))
            ->assertSee(Carbon::parse($events[0]->end)->format("d M Y H:i"))
            ->assertSee($events[0]->location)
            ->assertSee($events[0]->image)
            ->assertSee($events[0]->slug)
            ->assertDontSee($event_other->translate_name)
            ->assertDontSee(strip_tags(Str::limit($event_other->translate_description, 100)))
            ->assertDontSee($event_other->location)
            ->assertDontSee($event_other->image)
            ->assertDontSee($event_other->slug)
            ->assertDontSee("custom.")
            ->assertDontSee("index.")
            ->assertDontSee("message.")
            ->assertDontSee("page.")
            ->assertDontSee("validation.")
            ->assertStatus(200);

        foreach ($events as $event) {
            $event->deleteImage();
        }
        $event_other->deleteImage();
    }

    public function test_search()
    {
        $event_category = EventCategory::factory()->active()->create();
        $events = Event::factory()->active()->count(11)->create([
            "event_category_id" => $event_category->id,
        ]);

        $now = now();
        foreach ($events as $event) {
            $event->update(["start" => $now->addDay()]);
        }

        $response = $this->get(route("{$this->menu_slug}.index"));
        $response->assertStatus(200);
        $response->assertSeeLivewire(EventComponent::class);

        Livewire::test(EventComponent::class)
            ->set("search", $events[10]->translate_name)
            ->assertSet("search", $events[10]->translate_name)
            ->assertSee($events[10]->translate_name)
            ->assertSee($events[10]->event_category->translate_name)
            ->assertSee($events[10]->translate_name)
            ->assertSee(strip_tags(Str::limit($events[10]->translate_description, 100)))
            ->assertSee(Carbon::parse($events[10]->start)->format("d M Y H:i"))
            ->assertSee(Carbon::parse($events[10]->end)->format("d M Y H:i"))
            ->assertSee($events[10]->location)
            ->assertSee($events[10]->image)
            ->assertSee($events[10]->slug)
            ->assertHasNoErrors()
            ->assertDontSee($events[0]->translate_name)
            ->assertDontSee(strip_tags(Str::limit($events[0]->translate_description, 100)))
            ->assertDontSee($events[0]->location)
            ->assertDontSee($events[0]->image)
            ->assertDontSee($events[0]->slug)
            ->assertDontSee("custom.")
            ->assertDontSee("index.")
            ->assertDontSee("message.")
            ->assertDontSee("page.")
            ->assertDontSee("validation.")
            ->assertStatus(200);

        foreach ($events as $event) {
            $event->deleteImage();
        }
    }

    public function test_view()
    {
        $event_category = EventCategory::factory()->active()->create();
        $events = Event::factory()->active()->count(3)->create([
            "event_category_id" => $event_category->id,
        ]);

        $response = $this->get(route("{$this->menu_slug}.view", ["event_slug" => $events[0]->slug]));
        $response->assertStatus(200);
        $response->assertSeeLivewire(EventViewComponent::class);

        Livewire::test(EventViewComponent::class, ["event_slug" => $events[0]->slug])
            ->assertSee($event_category->translate_name)
            ->assertSee($event_category->slug)
            ->assertSee($events[0]->event_category->translate_name)
            ->assertSee($events[0]->translate_name)
            ->assertSee($events[0]->translate_description)
            ->assertSee(Carbon::parse($events[0]->start)->format("H:i:s - d F Y"))
            ->assertSee(Carbon::parse($events[0]->start)->diffForHumans())
            ->assertSee(Carbon::parse($events[0]->end)->format("H:i:s - d F Y"))
            ->assertSee(Carbon::parse($events[0]->end)->diffForHumans())
            ->assertSee($events[0]->location)
            ->assertSee($events[0]->image)
            ->assertSee($events[1]->translate_name)
            ->assertSee(strip_tags(Str::limit($events[1]->translate_description, 100)))
            ->assertSee(Carbon::parse($events[1]->start)->format("d M Y H:i"))
            ->assertSee(Carbon::parse($events[1]->end)->format("d M Y H:i"))
            ->assertSee($events[1]->location)
            ->assertSee($events[1]->image)
            ->assertSee($events[1]->slug)
            ->assertSee($events[2]->translate_name)
            ->assertSee(strip_tags(Str::limit($events[2]->translate_description, 100)))
            ->assertSee(Carbon::parse($events[2]->start)->format("d M Y H:i"))
            ->assertSee(Carbon::parse($events[2]->end)->format("d M Y H:i"))
            ->assertSee($events[2]->location)
            ->assertSee($events[2]->image)
            ->assertSee($events[2]->slug)
            ->assertDontSee("custom.")
            ->assertDontSee("index.")
            ->assertDontSee("message.")
            ->assertDontSee("page.")
            ->assertDontSee("validation.")
            ->assertStatus(200);

        $this->assertTrue($events[0]->exists());
        $this->assertTrue($event_category->exists());

        Storage::disk("images")->assertExists("{$this->menu_slug}/{$events[0]->image}");

        foreach ($events as $event) {
            $event->deleteImage();
        }
    }
}
