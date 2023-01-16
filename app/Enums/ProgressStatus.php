<?php

namespace App\Enums;

enum ProgressStatus: string
{
    case Draft = '1';

    case InProgress = '2';

    case Completed = '3';

    case NotCompleted = '4';
}
