<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\HomeComponent;
use App\Models\AdmissionCalendar;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Event;
use App\Models\EventCategory;
use App\Models\Newsletter;
use App\Models\Offer;
use App\Models\Registration;
use App\Models\Slider;
use App\Models\Testimony;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Livewire;
use Tests\TestCase;

class HomeTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase, WithFaker;

    public $menu_name = "Home";
    public $menu_icon = "fas fa-home";
    public $menu_slug = "home";
    public $menu_table = "home";
    public $menu_type = "index";

    public function test_index()
    {
        $slider = Slider::factory()->active()->create();
        $offer = Offer::factory()->active()->create();
        $admission_calendar = AdmissionCalendar::factory()->active()->create();
        $testimony = Testimony::factory()->active()->create();

        $blog_category = BlogCategory::factory()->active()->create();
        $blog = Blog::factory()->active()->create(["blog_category_id" => $blog_category->id]);
        $event_category = EventCategory::factory()->active()->create();
        $event = Event::factory()->active()->create([
            "event_category_id" => $event_category->id,
            "start" => now(),
            "end" => now(),
        ]);

        $response = $this->get(route("index"));
        $response->assertStatus(200);
        $response->assertSeeLivewire(HomeComponent::class);

        Livewire::test(HomeComponent::class)
            ->assertSee($slider->translate_name)
            ->assertSee($slider->translate_description)
            ->assertSee($slider->translate_button_name)
            ->assertSee($slider->button_link)
            ->assertSee($slider->image)
            ->assertSee($offer->translate_name)
            ->assertSee($offer->translate_description)
            ->assertSee($offer->translate_button_name)
            ->assertSee($offer->button_link)
            ->assertSee($event->translate_name)
            ->assertSee(strip_tags(Str::limit($event->translate_description, 100)))
            ->assertSee(strip_tags(Str::limit($event->location, 15)))
            ->assertSee(Carbon::parse($event->start)->format("d M Y H:i"))
            ->assertSee(Carbon::parse($event->end)->format("d M Y H:i"))
            ->assertSee($event->image)
            ->assertSee($event->slug)
            ->assertSee($testimony->name)
            ->assertSee($testimony->description)
            ->assertSee($testimony->graduate)
            ->assertSee($testimony->image)
            ->assertSee($blog->translate_name)
            ->assertSee(strip_tags(Str::limit($blog->translate_description, 300)))
            ->assertSee($blog->image)
            ->assertSee($blog->slug)
            ->assertDontSee("custom.")
            ->assertDontSee("index.")
            ->assertDontSee("message.")
            ->assertDontSee("page.")
            ->assertDontSee("validation.")
            ->assertStatus(200);

        $this->assertTrue($slider->exists());
        $this->assertTrue($offer->exists());
        $this->assertTrue($admission_calendar->exists());
        $this->assertTrue($testimony->exists());
        $this->assertTrue($blog_category->exists());
        $this->assertTrue($blog->exists());
        $this->assertTrue($event_category->exists());
        $this->assertTrue($event->exists());

        Storage::disk("images")->assertExists("slider/{$slider->image}");
        Storage::disk("images")->assertExists("testimony/{$testimony->image}");
        Storage::disk("images")->assertExists("blog/{$blog->image}");
        Storage::disk("images")->assertExists("event/{$event->image}");

        $slider->deleteImage();
        $testimony->deleteImage();
        $blog->deleteImage();
        $event->deleteImage();
    }
}
