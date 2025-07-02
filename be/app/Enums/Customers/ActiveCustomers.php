<?php

declare(strict_types=1);

namespace App\Enums\Customers;

use BenSampo\Enum\Enum;

final class ActiveCustomers extends Enum
{
    const UNACTIVATED = 0;
    const ACTIVATED = 1;
}
