<?php

declare(strict_types=1);

namespace App\Enums\Users;

use BenSampo\Enum\Enum;

final class ActiveUsers extends Enum
{
    const UNACTIVATED = 0;
    const ACTIVATED = 1;
}
