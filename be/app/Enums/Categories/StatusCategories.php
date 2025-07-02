<?php

declare(strict_types=1);

namespace App\Enums\Categories;

use BenSampo\Enum\Enum;

final class StatusCategories extends Enum
{
    const UNACTIVATED = 0;
    const ACTIVATED = 1;
}
