<?php

declare(strict_types=1);

namespace App\Enums\Users;

use BenSampo\Enum\Enum;

final class StatusUsers extends Enum
{
    const PENDING = 0;
    const ACTIVCE = 1;
    const BANNED = 2;
}
