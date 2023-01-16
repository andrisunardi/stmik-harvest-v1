<?php

namespace App\Enums;

enum PortfolioStatus: string
{
    case OnProgress = '0';

    case Finish = '1';

    case TakeOver = '2';

    case Cancel = '3';
}
