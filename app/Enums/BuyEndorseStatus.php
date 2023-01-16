<?php

namespace App\Enums;

enum BuyEndorseStatus: string
{
    case Error = '0';

    case Showed = '1';

    case Removed = '2';
}
