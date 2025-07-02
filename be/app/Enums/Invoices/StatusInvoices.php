<?php

declare(strict_types=1);

namespace App\Enums\Invoices;

use BenSampo\Enum\Enum;

final class StatusInvoices extends Enum
{
    const PENDING = 0;
    const SUCCESS = 1;
    const CANCELLED = 2;
}
