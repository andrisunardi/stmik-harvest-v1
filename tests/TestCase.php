<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\WithFaker;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, WithFaker;

    public $auth;

    public $subDomain;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed();

        $this->subDomain = 'cms';

        $this->auth = User::first();
    }
}
