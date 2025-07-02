<?php

declare(strict_types=1);

namespace App\Enums\Foods;

use BenSampo\Enum\Enum;

final class StatusFoods extends Enum
{
    const UNACTIVATED = 0;
    const ACTIVATED = 1;
}
