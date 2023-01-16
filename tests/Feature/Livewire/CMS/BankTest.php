<?php

namespace Tests\Feature\Livewire\CMS;

use App\Http\Livewire\CMS\Finance\BankComponent;
use App\Models\Bank;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Livewire\Livewire;
use Tests\TestCase;

class BankTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase, WithFaker;

    public $pageCategoryName = 'Finance';

    public $pageCategorySlug = 'finance';

    public $pageName = 'Bank';

    public $pageSlug = 'bank';

    public $pageTable = 'banks';

    public $pageIcon = 'fas fa-bank';

    public $pageType = 'index';

    public function test_index()
    {
        $bank = Bank::factory()->create();

        $response = $this->get(route("{$this->subDomain}.{$this->pageCategorySlug}.{$this->pageSlug}.index"));
        $response->assertStatus(302);

        $response = $this->actingAs($this->auth)->get(route("{$this->subDomain}.{$this->pageCategorySlug}.{$this->pageSlug}.index"));
        $response->assertStatus(200);
        $response->assertSeeLivewire(BankComponent::class);
        $response->assertSee('#');
        $response->assertSee('ID');
        $response->assertSee('Code');
        $response->assertSee('Name');
        $response->assertSee('Active');
        $response->assertSee('Total Administrative Cost');
        $response->assertSee('Detail');
        $response->assertSee('Action');
        $response->assertSee($bank->id);
        $response->assertSee($bank->code);
        $response->assertSee($bank->name);
        $response->assertSee(Str::active($bank->is_active));

        Livewire::test(BankComponent::class)
            ->assertSee($bank->code)
            ->assertSee($bank->name)
            ->assertSee(Str::active($bank->is_active))
            ->assertDontSee('custom.')
            ->assertDontSee('index.')
            ->assertDontSee('validation.')
            ->assertHasNoErrors()
            ->assertStatus(200);
    }

    public function test_search()
    {
        $bank = Bank::factory()->create();

        $response = $this->get(route("{$this->subDomain}.{$this->pageCategorySlug}.{$this->pageSlug}.index"));
        $response->assertStatus(302);

        $response = $this->actingAs($this->auth)->get(route("{$this->subDomain}.{$this->pageCategorySlug}.{$this->pageSlug}.index"));
        $response->assertStatus(200);
        $response->assertSeeLivewire(BankComponent::class);

        Livewire::test(BankComponent::class)
            ->assertSee($bank->code)
            ->assertSee($bank->name)
            ->assertSee(Str::active($bank->is_active))
            ->assertDontSee('custom.')
            ->assertDontSee('index.')
            ->assertDontSee('validation.')
            ->assertHasNoErrors()
            ->assertStatus(200);
    }

    public function test_add()
    {
        $response = $this->get(route("{$this->subDomain}.{$this->pageCategorySlug}.{$this->pageSlug}.index"));
        $response->assertStatus(302);

        $response = $this->actingAs($this->auth)->get(route("{$this->subDomain}.{$this->pageCategorySlug}.{$this->pageSlug}.index"));
        $response->assertStatus(200);
        $response->assertSeeLivewire(BankComponent::class);

        Livewire::test(BankComponent::class)
            ->assertDontSee('custom.')
            ->assertDontSee('index.')
            ->assertDontSee('validation.')
            ->assertHasNoErrors()
            ->assertStatus(200);

        $bank = Bank::count();
        $this->assertEquals($bank, 1);
    }
}
