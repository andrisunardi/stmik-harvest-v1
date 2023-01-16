<?php

namespace App\Enums;

enum BuyItemStatus: string
{
    case Used = '1';

    case Open = '2';

    case Sold = '3';

    case Lost = '4';

    case Stolen = '5';
}
