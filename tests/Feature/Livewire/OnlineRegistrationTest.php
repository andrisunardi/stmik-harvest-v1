<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\OnlineRegistrationComponent;
use App\Models\Registration;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class OnlineRegistrationTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase, WithFaker;

    public $menu_name = "Online Registration";
    public $menu_icon = "fas fa-question";
    public $menu_slug = "online-registration";
    public $menu_table = "registration";
    public $menu_type = "index";

    public function test_index()
    {
        $response = $this->get(route("{$this->menu_slug}.index"));
        $response->assertStatus(200);
        $response->assertSeeLivewire(OnlineRegistrationComponent::class);

        Livewire::test(OnlineRegistrationComponent::class)
            ->assertSee("name")
            ->assertSee("email")
            ->assertSee("phone")
            ->assertSee("school")
            ->assertSee("major")
            ->assertSee("city")
            ->assertSee("gender")
            ->assertSee("type")
            ->assertSee("submit")
            ->set("name", null)
            ->set("email", null)
            ->set("phone", null)
            ->set("gender", null)
            ->set("school", null)
            ->set("major", null)
            ->set("city", null)
            ->call("submit")
            ->assertHasErrors([
                "name" => "required",
                "email" => "required",
                "phone" => "required",
                "gender" => "required",
                "school" => "required",
                "major" => "required",
                "city" => "required",
            ])
            ->assertDontSee("custom.")
            ->assertDontSee("index.")
            ->assertDontSee("message.")
            ->assertDontSee("page.")
            ->assertDontSee("validation.")
            ->assertStatus(200);

        $data = [
            "name" => $this->faker->unique()->name(),
            "email" => $this->faker->unique()->email(),
            "phone" => 0 . $this->faker->unique()->numberBetween(80000000000, 89999999999),
            "gender" => $this->faker->numberBetween(1, 2),
            "school" => $this->faker->word(),
            "major" => $this->faker->word(),
            "city" => $this->faker->city(),
            "type" => $this->faker->numberBetween(1, 2),
        ];

        Livewire::test(OnlineRegistrationComponent::class)
            ->assertSee("name")
            ->assertSee("email")
            ->assertSee("phone")
            ->assertSee("school")
            ->assertSee("major")
            ->assertSee("city")
            ->assertSee("gender")
            ->assertSee("type")
            ->assertSee("submit")
            ->set("name", $data["name"])
            ->set("email", $data["email"])
            ->set("phone", $data["phone"])
            ->set("gender", $data["gender"])
            ->set("school", $data["school"])
            ->set("major", $data["major"])
            ->set("city", $data["city"])
            ->set("type", $data["type"])
            ->call("submit")
            ->assertHasNoErrors()
            ->assertDontSee("custom.")
            ->assertDontSee("index.")
            ->assertDontSee("message.")
            ->assertDontSee("page.")
            ->assertDontSee("validation.")
            ->assertStatus(200);

        $this->assertTrue(
            Registration::whereName($data["name"])
                ->whereEmail($data["email"])
                ->wherePhone($data["phone"])
                ->whereSchool($data["school"])
                ->whereMajor($data["major"])
                ->whereCity($data["city"])
                ->whereGender($data["gender"])
                ->whereType($data["type"])
                ->whereActive(true)
            ->exists());
    }
}
