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
        $event = Event::factory()->active()->create(["event_category_id" => $event_category->id]);

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
            // ->assertSee($lecturer->name)
            // ->assertSee(strip_tags(Str::limit($lecturer->description, 200)))
            // ->assertSee($lecturer->job)
            // ->assertSee($lecturer->instagram)
            // ->assertSee($lecturer->image)
            // ->assertSee($lecturer->slug)
            // ->assertSee($study_program->name_id)
            // ->assertSee($study_program->image)
            // ->assertSee($study_program->data_course->count())
            // ->assertSee($news->name_id)
            // ->assertSee(strip_tags(Str::limit($news->description_id, 100)))
            // ->assertSee($news->image)
            // ->assertSee(Carbon::parse($news->date)->format("d"))
            // ->assertSee(Carbon::parse($news->date)->format("M"))
            // ->assertSee(Carbon::parse($news->date)->format("d F Y"))
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
