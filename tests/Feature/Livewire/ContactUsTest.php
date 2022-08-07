<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\ContactUsComponent;
use App\Models\Contact;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ContactUsTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase, WithFaker;

    public $menu_name = 'Contact Us';

    public $menu_icon = 'fas fa-phone';

    public $menu_slug = 'contact-us';

    public $menu_table = 'contact';

    public $menu_type = 'index';

    public function test_index()
    {
        $response = $this->get(route("{$this->menu_slug}.index"));
        $response->assertStatus(200);
        $response->assertSeeLivewire(ContactUsComponent::class);

        Livewire::test(ContactUsComponent::class)
            ->assertSee('name')
            ->assertSee('phone')
            ->assertSee('email')
            ->assertSee('company')
            ->assertSee('message')
            ->set('name', null)
            ->set('email', null)
            ->set('phone', null)
            ->set('company', null)
            ->set('message', null)
            ->call('submit')
            ->assertHasErrors([
                'name' => 'required',
                'email' => 'required',
                'message' => 'required',
            ])
            ->assertDontSee('custom.')
            ->assertDontSee('index.')
            ->assertDontSee('validation.')
            ->assertStatus(200);

        $data = [
            'name' => $this->faker->unique()->name(),
            'phone' => $this->faker->unique()->phoneNumber(),
            'email' => $this->faker->unique()->email(),
            'company' => $this->faker->unique()->company(),
            'message' => $this->faker->paragraph(),
        ];

        Livewire::test(ContactUsComponent::class)
            ->assertSee('name')
            ->assertSee('phone')
            ->assertSee('email')
            ->assertSee('company')
            ->assertSee('message')
            ->assertSee('submit')
            ->set('name', $data['name'])
            ->set('phone', $data['phone'])
            ->set('email', $data['email'])
            ->set('company', $data['company'])
            ->set('message', $data['message'])
            ->call('submit')
            ->assertHasNoErrors()
            ->assertDontSee('custom.')
            ->assertDontSee('index.')
            ->assertDontSee('validation.')
            ->assertStatus(200);

        $this->assertTrue(
            Contact::whereName($data['name'])
                ->wherePhone($data['phone'])
                ->whereEmail($data['email'])
                ->whereCompany($data['company'])
                ->whereMessage($data['message'])
                ->whereActive(true)
                ->exists()
        );
    }
}
