<?php

namespace App\Enums;

use App\Enums\Traits\EnumLabel;

enum TicketGroupOperatingFreeMode: int
{
    use EnumLabel;

    case PARTICIPANT = 10;
    case PRIZE_VALUE = 20;
}
