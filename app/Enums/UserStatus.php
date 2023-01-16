<?php

namespace App\Enums;

enum UserStatus: string
{
    case Active = '1';

    case Verifying = '2';

    case Blocked = '3';

    case InActive = '4';
}
