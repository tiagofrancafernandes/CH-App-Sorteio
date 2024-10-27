<?php

namespace App\Enums;

enum WalletTransactionMode: string
{
    case IN = 'IN';
    case OUT = 'OUT';
    case NO_ONE = 'NO_ONE';
    case UNKNOWN = 'UNKNOWN';
}
