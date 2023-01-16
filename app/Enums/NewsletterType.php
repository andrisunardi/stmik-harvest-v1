<?php

namespace App\Enums;

enum NewsletterType: string
{
    case Email = '1';

    case Whatsapp = '2';

    case SMS = '3';

    case Call = '4';
}
