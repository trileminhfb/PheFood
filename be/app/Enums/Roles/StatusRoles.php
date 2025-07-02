<?php

declare(strict_types=1);

namespace App\Enums\Roles;

use BenSampo\Enum\Enum;

final class StatusRoles extends Enum
{
    const UNACTIVATED = 0;
    const ACTIVATED = 1;
}
