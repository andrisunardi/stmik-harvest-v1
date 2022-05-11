<?php

namespace Tests\Feature;


use App\Http\Livewire\NewsComponent;
use App\Http\Livewire\NewsViewComponent;
use App\Models\News;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase, WithFaker;

    public function test_index()
    {
        Livewire::test(NewsComponent::class)
            ->assertDontSee("validation.")
            ->assertStatus(200);
    }

    public function test_view()
    {
        $news = News::factory()->create(["active" => true]);

        Livewire::test(NewsViewComponent::class, ["news_slug" => $news->slug])
            ->assertSee($news->name)
            ->assertDontSee("validation.")
            ->assertStatus(200);
    }
}
