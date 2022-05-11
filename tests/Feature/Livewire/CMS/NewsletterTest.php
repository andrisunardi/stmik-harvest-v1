<?php

namespace Tests\Feature\Livewire\CMS;

use App\Http\Livewire\CMS\NewsletterComponent;
use App\Models\Newsletter;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsletterTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase, WithFaker;

    public $menu_name = "Newsletter";
    public $menu_icon = "bi bi-mailbox";
    public $menu_slug = "newsletter";
    public $menu_table = "newsletter";
    public $menu_type = "index";

    public function test_index()
    {
        $newsletter = Newsletter::factory()->create();

        Livewire::actingAs($this->admin)
            ->withQueryParams(["menu_type" => "index"])
            ->test(NewsletterComponent::class)
            ->assertSee("email")
            ->assertSee("active")
            ->set("menu_type", "index")
            ->set("email", null)
            ->set("active", null)
            ->assertSee("Add")
            ->assertSee("Trash")
            ->assertSee("Reset Filter")
            ->assertSee("Export To Excel")
            ->assertSee("Export To PDF")
            ->assertSee("Per Page")
            ->assertSee("10")
            ->assertSee("25")
            ->assertSee("50")
            ->assertSee("100")
            ->assertSee("1000")
            ->assertSee("Order By")
            ->assertSee("ID")
            ->assertSee("Email")
            ->assertSee("Active")
            ->assertSee("Created By")
            ->assertSee("Updated By")
            ->assertSee("Created At")
            ->assertSee("Updated At")
            ->assertSee("Sort By")
            ->assertSee("Ascending")
            ->assertSee("Descending")
            ->assertSee("Created By")
            ->assertSee("All")
            ->assertSee("Updated By")
            ->assertSee("All")
            ->assertSee("Start Created At")
            ->assertSee("End Created At")
            ->assertSee("Start Updated At")
            ->assertSee("End Updated At")
            ->assertSee("Active")
            ->assertSee("All")
            ->assertSee("Yes")
            ->assertSee("No")
            ->assertSee("Email")
            ->assertSee("#")
            ->assertSee("ID")
            ->assertSee("Email")
            ->assertSee("Active")
            ->assertSee("Created At")
            ->assertSee("Updated At")
            ->assertSee("Created By")
            ->assertSee("Updated By")
            ->assertSee("Action")
            ->assertSee($newsletter->id)
            ->assertSee($newsletter->email)
            ->assertSee($newsletter->active_text)
            ->assertSee($newsletter->created_at->format("H:i:s - l, d F Y"))
            ->assertSee($newsletter->updated_at->format("H:i:s - l, d F Y"))
            ->assertSee($newsletter->created_by_admin->name)
            ->assertSee($newsletter->updated_by_admin->name)
            ->assertStatus(200);
    }

    public function test_add()
    {
        Livewire::actingAs($this->admin)
            ->withQueryParams(["menu_type" => "index"])
            ->test(NewsletterComponent::class)
            ->set("menu_type", "index")
            ->call("form", "add", "")
            ->assertSee("Back")
            ->assertSee("Refresh")
            ->assertSee("Email")
            ->assertSee("Active")
            ->assertSee("Active")
            ->assertSee("Non Active")
            ->assertSee("Save")
            ->assertSee("Reset")
            ->assertStatus(200);

        Livewire::actingAs($this->admin)
            ->withQueryParams(["menu_type" => "add"])
            ->test(NewsletterComponent::class)
            ->set("menu_type", "add")
            ->set("email", null)
            ->set("active", null)
            ->call("submit")
            ->assertHasErrors([
                "email" => "required",
                "active" => "required",
            ])
            ->assertStatus(200);

        $data = [
            "email" => $this->faker->email(),
            "active" => $this->faker->boolean(),
        ];

        Livewire::actingAs($this->admin)
            ->withQueryParams(["menu_type" => "add"])
            ->test(NewsletterComponent::class)
            ->set("menu_type", "add")
            ->set("email", $data["email"])
            ->set("active", $data["active"])
            ->call("submit")
            ->assertHasNoErrors()
            ->assertStatus(200);

        $this->assertTrue(Newsletter::whereEmail($data["email"])->whereActive($data["active"])->exists());
    }

    public function test_clone()
    {
        $newsletter = Newsletter::factory()->create();

        $data = [
            "email" => $this->faker->email(),
            "active" => $this->faker->boolean(),
        ];

        Livewire::actingAs($this->admin)
            ->withQueryParams(["menu_type" => "clone"])
            ->test(NewsletterComponent::class)
            ->set("menu_type", "clone")
            ->set("email", $data["email"])
            ->set("active", $data["active"])
            ->call("submit")
            ->assertHasNoErrors()
            ->assertStatus(200);

        $this->assertTrue(Newsletter::whereEmail($data["email"])->whereActive($data["active"])->exists());
    }

    public function test_edit()
    {
        $newsletter = Newsletter::factory()->create();

        $data = [
            "email" => $this->faker->email(),
            "active" => $this->faker->boolean(),
        ];

        Livewire::actingAs($this->admin)
            ->withQueryParams(["menu_type" => "edit", "row" => $newsletter->id])
            ->test(NewsletterComponent::class)
            ->set("menu_type", "edit")
            ->set("row", $newsletter->id)
            ->set("email", $data["email"])
            ->set("active", $data["active"])
            ->call("submit")
            ->assertHasNoErrors()
            ->assertStatus(200);

        $this->assertTrue(Newsletter::whereEmail($data["email"])->whereActive($data["active"])->exists());
    }

    public function test_view()
    {
        $newsletter = Newsletter::factory()->create();

        Livewire::actingAs($this->admin)
            ->withQueryParams(["menu_type" => "view", "row" => $newsletter->id])
            ->test(NewsletterComponent::class)
            ->set("menu_type", "view")
            ->assertHasNoErrors()
            ->assertStatus(200);
    }

    public function test_delete()
    {
        Livewire::actingAs($this->admin)
            ->withQueryParams(["menu_type" => "index"])
            ->test(NewsletterComponent::class)
            ->set("menu_type", "index")
            ->assertHasNoErrors()
            ->assertStatus(200);
    }

    public function test_trash()
    {
        Livewire::actingAs($this->admin)
            ->withQueryParams(["menu_type" => "trash"])
            ->test(NewsletterComponent::class)
            ->set("menu_type", "trash")
            ->assertHasNoErrors()
            ->assertStatus(200);
    }

    public function test_restore()
    {
        Livewire::actingAs($this->admin)
            ->test(NewsletterComponent::class)
            ->set("menu_type", "trash")
            ->assertHasNoErrors()
            ->assertStatus(200);
    }

    public function test_delete_permanent()
    {
        Livewire::actingAs($this->admin)
            ->test(NewsletterComponent::class)
            ->set("menu_type", "trash")
            ->assertHasNoErrors()
            ->assertStatus(200);
    }
}
