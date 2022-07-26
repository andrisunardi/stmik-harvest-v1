<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\BlogComponent;
use App\Http\Livewire\BlogViewComponent;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Livewire;
use Tests\TestCase;

class BlogTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase, WithFaker;

    public $menu_name = 'Blog';

    public $menu_icon = 'fas fa-newspaper';

    public $menu_slug = 'blog';

    public $menu_table = 'blog';

    public $menu_type = 'index';

    public function test_index()
    {
        $blog_category = BlogCategory::factory()->active()->create();
        $blog = Blog::factory()->active()->create([
            'blog_category_id' => $blog_category->id,
            'date' => now(),
        ]);

        $response = $this->get(route("{$this->menu_slug}.index"));
        $response->assertStatus(200);
        $response->assertSeeLivewire(BlogComponent::class);

        Livewire::test(BlogComponent::class)
            ->assertSee($blog->translate_name)
            ->assertSee(strip_tags(Str::limit($blog->translate_description, 300)))
            ->assertSee(Carbon::parse($blog->date)->format('d F Y'))
            ->assertSee($blog->image)
            ->assertSee($blog->slug)
            ->assertDontSee('custom.')
            ->assertDontSee('index.')
            ->assertDontSee('message.')
            ->assertDontSee('page.')
            ->assertDontSee('validation.')
            ->assertStatus(200);

        $this->assertTrue($blog->exists());

        Storage::disk('images')->assertExists("{$this->menu_slug}/{$blog->image}");

        $blog->deleteImage();
    }

    public function test_search()
    {
        $blog_category = BlogCategory::factory()->active()->create();
        $blogs = Blog::factory()->active()->count(2)->create([
            'blog_category_id' => $blog_category->id,
        ]);

        $now = now();
        foreach ($blogs as $blog) {
            $blog->update(['date' => $now->addDay()]);
        }

        $response = $this->get(route("{$this->menu_slug}.index"));
        $response->assertStatus(200);
        $response->assertSeeLivewire(BlogComponent::class);

        Livewire::test(BlogComponent::class)
            ->set('search', $blogs[1]->translate_name)
            ->assertSet('search', $blogs[1]->translate_name)
            ->assertSee($blogs[1]->translate_name)
            ->assertSee(strip_tags(Str::limit($blogs[1]->translate_description, 300)))
            ->assertSee(Carbon::parse($blogs[1]->date)->format('d F Y'))
            ->assertSee($blogs[1]->image)
            ->assertSee($blogs[1]->slug)
            ->assertHasNoErrors()
            ->assertDontSee($blogs[0]->translate_name)
            ->assertDontSee(strip_tags(Str::limit($blogs[0]->translate_description, 300)))
            ->assertDontSee($blogs[0]->image)
            ->assertDontSee($blogs[0]->slug)
            ->assertDontSee('custom.')
            ->assertDontSee('index.')
            ->assertDontSee('message.')
            ->assertDontSee('page.')
            ->assertDontSee('validation.')
            ->assertStatus(200);

        foreach ($blogs as $blog) {
            $blog->deleteImage();
        }
    }

    public function test_view()
    {
        $blog_category = BlogCategory::factory()->active()->create();
        $blogs = Blog::factory()->active()->count(3)->create([
            'blog_category_id' => $blog_category->id,
        ]);

        $response = $this->get(route("{$this->menu_slug}.view", ['blog_slug' => $blogs[0]->slug]));
        $response->assertStatus(200);
        $response->assertSeeLivewire(BlogViewComponent::class);

        Livewire::test(BlogViewComponent::class, ['blog_slug' => $blogs[0]->slug])
            ->assertSee($blog_category->translate_name)
            ->assertSee($blog_category->slug)
            ->assertSee($blogs[0]->blog_category->translate_name)
            ->assertSee($blogs[0]->translate_name)
            ->assertSee($blogs[0]->translate_description)
            ->assertSee(Carbon::parse($blogs[0]->date)->format('d F Y'))
            ->assertSee($blogs[0]->image)
            ->assertSee($blogs[1]->translate_name)
            ->assertSee(strip_tags(Str::limit($blogs[1]->translate_description, 100)))
            ->assertSee(Carbon::parse($blogs[1]->date)->format('d F Y'))
            ->assertSee($blogs[1]->image)
            ->assertSee($blogs[1]->slug)
            ->assertSee($blogs[2]->translate_name)
            ->assertSee(strip_tags(Str::limit($blogs[2]->translate_description, 100)))
            ->assertSee(Carbon::parse($blogs[2]->date)->format('d F Y'))
            ->assertSee($blogs[2]->image)
            ->assertSee($blogs[2]->slug)
            ->assertDontSee('custom.')
            ->assertDontSee('index.')
            ->assertDontSee('message.')
            ->assertDontSee('page.')
            ->assertDontSee('validation.')
            ->assertStatus(200);

        $this->assertTrue($blogs[0]->exists());
        $this->assertTrue($blog_category->exists());

        Storage::disk('images')->assertExists("{$this->menu_slug}/{$blogs[0]->image}");

        foreach ($blogs as $blog) {
            $blog->deleteImage();
        }
    }
}
