<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Enums\Table\StatusTables;

class TableSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $items = [
            ['Number' => 1, 'Status' => StatusTables::AVAILABLE],
            ['Number' => 2, 'Status' => StatusTables::UNAVAILABLE],
            ['Number' => 3, 'Status' => StatusTables::BOOKED],
            ['Number' => 4, 'Status' => StatusTables::MAINTENANCE],
        ];

        foreach ($items as &$item) {
            $item['created_at'] = $now;
            $item['updated_at'] = $now;
            $item['Amount'] = random_int(4, 10);
        }

        DB::table('tables')->insert($items);
    }
}
