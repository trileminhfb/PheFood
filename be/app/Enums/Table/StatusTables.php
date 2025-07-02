<?php

declare(strict_types=1);

namespace App\Enums\Table;

use BenSampo\Enum\Enum;

final class StatusTables extends Enum
{
    const UNAVAILABLE = 0;
    const AVAILABLE = 1;
    const BOOKED = 2;
    const MAINTENANCE = 3;
}
