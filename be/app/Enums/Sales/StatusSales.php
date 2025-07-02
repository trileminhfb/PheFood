<?php

declare(strict_types=1);

namespace App\Enums\Sales;

use BenSampo\Enum\Enum;

final class StatusSales extends Enum
{
    const UNACTIVATED = 0;
    const ACTIVATED = 1;
}
