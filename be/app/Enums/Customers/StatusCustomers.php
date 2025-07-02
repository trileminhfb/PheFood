<?php

declare(strict_types=1);

namespace App\Enums\Customers;

use BenSampo\Enum\Enum;

final class StatusCustomers extends Enum
{
    const PENDING = 0;
    const ACTIVATED = 1;
    const BANNED = 2;
}
