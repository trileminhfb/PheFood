<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WarehouseSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $items = [
            ['ID_Ingredient' => 1], // Đường
            ['ID_Ingredient' => 2], // Muối
            ['ID_Ingredient' => 3], // Dầu ăn
            ['ID_Ingredient' => 4], // Nước mắm
            ['ID_Ingredient' => 5], // Tỏi
        ];

        foreach ($items as &$item) {
            $item['created_at'] = $now;
            $item['updated_at'] = $now;
            $item['Amount'] = random_int(1, 50);
        }

        DB::table('warehouses')->insert($items);
    }
}
