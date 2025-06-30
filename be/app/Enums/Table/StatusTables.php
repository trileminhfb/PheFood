<?php

declare(strict_types=1);

namespace App\Enums\Table;

use BenSampo\Enum\Enum;

final class StatusTables extends Enum
{
    const UNACTIVCE = 0;
    const ACTIVCE = 1;
    const RESERVED = 2;
}
