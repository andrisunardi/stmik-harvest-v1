<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\GalleryComponent;
use App\Models\Gallery;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class GalleryTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase, WithFaker;

    public $menu_name = 'Gallery';

    public $menu_icon = 'fas fa-images';

    public $menu_slug = 'gallery';

    public $menu_table = 'gallery';

    public $menu_type = 'index';

    public function test_index()
    {
        $gallery_image = Gallery::factory()->image()->active()->create();
        $gallery_video = Gallery::factory()->video()->active()->create();
        $gallery_youtube = Gallery::factory()->youtube()->active()->create();

        $response = $this->get(route("{$this->menu_slug}.index"));
        $response->assertStatus(200);
        $response->assertSeeLivewire(GalleryComponent::class);

        Livewire::test(GalleryComponent::class)
            ->assertSee($gallery_image->translate_name)
            ->assertSee($gallery_image->image)
            ->assertSee($gallery_video->translate_name)
            ->assertSee($gallery_video->image)
            ->assertSee($gallery_video->video)
            ->assertSee($gallery_youtube->translate_name)
            ->assertSee($gallery_youtube->translate_tag)
            ->assertSee($gallery_youtube->category_text)
            ->assertSee($gallery_youtube->image)
            ->assertSee($gallery_youtube->youtube)
            ->assertDontSee('custom.')
            ->assertDontSee('index.')
            ->assertDontSee('message.')
            ->assertDontSee('page.')
            ->assertDontSee('validation.')
            ->assertStatus(200);

        $this->assertTrue($gallery_image->exists());
        $this->assertTrue($gallery_video->exists());
        $this->assertTrue($gallery_youtube->exists());

        Storage::disk('images')->assertExists("{$this->menu_slug}/{$gallery_image->image}");
        Storage::disk('images')->assertExists("{$this->menu_slug}/{$gallery_video->image}");
        Storage::disk('images')->assertExists("{$this->menu_slug}/{$gallery_youtube->image}");

        $gallery_image->deleteImage();
        $gallery_video->deleteImage();
        $gallery_video->deleteVideo();
        $gallery_youtube->deleteImage();
    }
}
