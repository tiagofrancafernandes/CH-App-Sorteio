<?php

namespace App\Enums;

use App\Enums\Traits\EnumLabel;

enum TicketGroupStatus: int
{
    use EnumLabel;

    case CLOSED_WITHOUT_DRAW = 10;
    case DRAWN = 20;
    case CANCELED_DUE_TO_TIMEOUT = 30;
    case CANCELED_DUE_TO_GENERAL_VOTE  = 40;
    case CANCELED_DUE_TO_INTERNAL_FAILURE = 50;
    case OPEN_FOR_ENTRY = 60;
    case RAFFLING = 70;
}
