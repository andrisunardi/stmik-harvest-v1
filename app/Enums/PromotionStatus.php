<?php

namespace App\Enums;

enum PromotionStatus: string
{
    case Active = '1';

    case Expired = '2';

    case Cancelled = '3';
}
