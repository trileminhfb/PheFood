<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Enums\Sales\StatusSales;

class SaleSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $items = [
            [
                'Name' => 'Khuyến mãi Tết',
                'Start' => Carbon::create(2025, 1, 10, 0, 0, 0),
                'End' => Carbon::create(2025, 2, 10, 23, 59, 59),
                'Status' => StatusSales::ACTIVATED,
            ],
            [
                'Name' => 'Sale hè rực rỡ',
                'Start' => Carbon::create(2025, 6, 1, 0, 0, 0),
                'End' => Carbon::create(2025, 6, 30, 23, 59, 59),
                'Status' => StatusSales::ACTIVATED,
            ],
            [
                'Name' => 'Black Friday',
                'Start' => Carbon::create(2025, 11, 25, 0, 0, 0),
                'End' => Carbon::create(2025, 11, 30, 23, 59, 59),
                'Status' => StatusSales::UNACTIVATED,
            ],
        ];

        foreach ($items as &$item) {
            $item['created_at'] = $now;
            $item['updated_at'] = $now;
            $percent = 0;
            $item['Percent'] = $percent + 2;
        }

        DB::table('sales')->insert($items);
    }
}
