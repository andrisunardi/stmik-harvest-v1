<?php

namespace App\Enums;

enum CareerStatus: string
{
    case Open = '1';

    case Closed = '2';

    case Sold = '3';

    case Full = '4';

    case Expired = '5';
}
