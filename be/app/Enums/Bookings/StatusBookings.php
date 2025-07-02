<?php

declare(strict_types=1);

namespace App\Enums\Bookings;

use BenSampo\Enum\Enum;

final class StatusBookings extends Enum
{
    const PENDING = 0;
    const SUCCESS = 1;
    const REJECT = 2;
    const CANCELLED = 3;
}
