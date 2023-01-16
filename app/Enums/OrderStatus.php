<?php

namespace App\Enums;

enum OrderStatus: string
{
    case Pending = '1';

    case Completed = '2';

    case Rejected = '3';
}
