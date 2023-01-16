<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UserRule implements Rule
{
    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        //
    }

    public function message()
    {
        return 'The validation error message.';
    }
}
