<?php

declare(strict_types=1);

namespace App\Enums\Types;

use BenSampo\Enum\Enum;

final class StatusTypes extends Enum
{
    const UNACTIVATED = 0;
    const ACTIVATED = 1;
}
