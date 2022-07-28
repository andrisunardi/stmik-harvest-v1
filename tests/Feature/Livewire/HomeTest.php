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

    public $menu_name = 'Home';

    public $menu_icon = 'fas fa-home';

    public $menu_slug = 'home';

    public $menu_table = 'home';

    public $menu_type = 'index';

    public function test_index()
    {
        $slider = Slider::factory()->active()->create();
        $offer = Offer::factory()->active()->create();
        $admission_calendar = AdmissionCalendar::factory()->active()->create();
        $testimony = Testimony::factory()->active()->create();

        $blog_category = BlogCategory::factory()->active()->create();
        $blog = Blog::factory()->active()->create(['blog_category_id' => $blog_category->id]);
        $event_category = EventCategory::factory()->active()->create();
        $event = Event::factory()->active()->create([
            'event_category_id' => $event_category->id,
            'start' => now(),
            'end' => now(),
        ]);

        $response = $this->get(route('index'));
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
            ->assertSee(Carbon::parse($event->start)->format('d M Y H:i'))
            ->assertSee(Carbon::parse($event->end)->format('d M Y H:i'))
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
            ->assertDontSee('custom.')
            ->assertDontSee('index.')
            ->assertDontSee('message.')
            ->assertDontSee('page.')
            ->assertDontSee('validation.')
            ->assertStatus(200);

        $this->assertTrue($slider->exists());
        $this->assertTrue($offer->exists());
        $this->assertTrue($admission_calendar->exists());
        $this->assertTrue($testimony->exists());
        $this->assertTrue($blog_category->exists());
        $this->assertTrue($blog->exists());
        $this->assertTrue($event_category->exists());
        $this->assertTrue($event->exists());

        Storage::disk('images')->assertExists("slider/{$slider->image}");
        Storage::disk('images')->assertExists("testimony/{$testimony->image}");
        Storage::disk('images')->assertExists("blog/{$blog->image}");
        Storage::disk('images')->assertExists("event/{$event->image}");

        $slider->deleteImage();
        $testimony->deleteImage();
        $blog->deleteImage();
        $event->deleteImage();
    }

    // public function test_registration()
    // {
    //     $response = $this->get(route('index'));
    //     $response->assertStatus(200);
    //     $response->assertSeeLivewire(HomeComponent::class);

    //     Livewire::test(HomeComponent::class)
    //         ->assertSee('name')
    //         ->assertSee('email')
    //         ->assertSee('phone')
    //         ->assertSee('school')
    //         ->assertSee('major')
    //         ->assertSee('city')
    //         ->assertSee('gender')
    //         ->assertSee('type')
    //         ->assertSee('submit')
    //         ->set('name', null)
    //         ->set('email', null)
    //         ->set('phone', null)
    //         ->set('gender', null)
    //         ->set('school', null)
    //         ->set('major', null)
    //         ->set('city', null)
    //         ->call('submit')
    //         ->assertHasErrors([
    //             'name' => 'required',
    //             'email' => 'required',
    //             'phone' => 'required',
    //             'gender' => 'required',
    //             'school' => 'required',
    //             'major' => 'required',
    //             'city' => 'required',
    //         ])
    //         ->assertDontSee('custom.')
    //         ->assertDontSee('index.')
    //         ->assertDontSee('message.')
    //         ->assertDontSee('page.')
    //         ->assertDontSee('validation.')
    //         ->assertStatus(200);

    //     $data = [
    //         'name' => $this->faker->unique()->name(),
    //         'email' => $this->faker->unique()->email(),
    //         'phone' => $this->faker->unique()->phoneNumber(),
    //         'gender' => $this->faker->numberBetween(1, 2),
    //         'school' => $this->faker->word(),
    //         'major' => $this->faker->word(),
    //         'city' => $this->faker->city(),
    //         'type' => $this->faker->numberBetween(1, 2),
    //     ];

    //     Livewire::test(HomeComponent::class)
    //         ->assertSee('name')
    //         ->assertSee('email')
    //         ->assertSee('phone')
    //         ->assertSee('school')
    //         ->assertSee('major')
    //         ->assertSee('city')
    //         ->assertSee('gender')
    //         ->assertSee('type')
    //         ->assertSee('submit')
    //         ->set('name', $data['name'])
    //         ->set('email', $data['email'])
    //         ->set('phone', $data['phone'])
    //         ->set('gender', $data['gender'])
    //         ->set('school', $data['school'])
    //         ->set('major', $data['major'])
    //         ->set('city', $data['city'])
    //         ->set('type', $data['type'])
    //         ->call('submit')
    //         ->assertHasNoErrors()
    //         ->assertDontSee('custom.')
    //         ->assertDontSee('index.')
    //         ->assertDontSee('message.')
    //         ->assertDontSee('page.')
    //         ->assertDontSee('validation.')
    //         ->assertStatus(200);

    //     $this->assertTrue(
    //         Registration::whereName($data['name'])
    //             ->whereEmail($data['email'])
    //             ->wherePhone($data['phone'])
    //             ->whereSchool($data['school'])
    //             ->whereMajor($data['major'])
    //             ->whereCity($data['city'])
    //             ->whereGender($data['gender'])
    //             ->whereType($data['type'])
    //             ->whereActive(true)
    //         ->exists());
    // }

    // public function test_newsletter()
    // {
    //     $response = $this->get(route('index'));
    //     $response->assertStatus(200);
    //     $response->assertSeeLivewire(HomeComponent::class);

    //     Livewire::test(HomeComponent::class)
    //         ->assertSee('email')
    //         ->assertSee('submit')
    //         ->set('email', null)
    //         ->call('newsletter')
    //         ->assertHasErrors([
    //             'emailNewsletter' => 'required',
    //         ])
    //         ->assertDontSee('custom.')
    //         ->assertDontSee('index.')
    //         ->assertDontSee('message.')
    //         ->assertDontSee('page.')
    //         ->assertDontSee('validation.')
    //         ->assertStatus(200);

    //     $data = [
    //         'email' => $this->faker->unique()->email(),
    //     ];

    //     Livewire::test(HomeComponent::class)
    //         ->assertSee('email')
    //         ->assertSee('submit')
    //         ->set('emailNewsletter', $data['email'])
    //         ->call('newsletter')
    //         ->assertHasNoErrors()
    //         ->assertDontSee('custom.')
    //         ->assertDontSee('index.')
    //         ->assertDontSee('message.')
    //         ->assertDontSee('page.')
    //         ->assertDontSee('validation.')
    //         ->assertStatus(200);

    //     $this->assertTrue(
    //         Newsletter::whereEmail($data['email'])->whereActive(true)->exists());
    // }
}
