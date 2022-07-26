<?php

namespace Tests;

use App\Models\Admin;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed();

        $this->password = $this->faker->password();
        $password = Hash::make($this->password);

        $this->admin = Admin::factory()->active()->create(['password' => $password]);
        $this->admin->deleteImage();
    }
}
