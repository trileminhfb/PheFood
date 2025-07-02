<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $items = [
            ['Name' => 'Đường', 'Unit' => 'Thùng'],
            ['Name' => 'Muối', 'Unit' => 'Thùng'],
            ['Name' => 'Dầu ăn', 'Unit' => 'Thùng'],
            ['Name' => 'Nước mắm', 'Unit' => 'Thùng'],
            ['Name' => 'Tỏi', 'Unit' => 'Thùng'],
            ['Name' => 'Ớt', 'Unit' => 'Thùng'],
            ['Name' => 'Hành tím', 'Unit' => 'Thùng'],
        ];

        foreach ($items as &$item) {
            $item['created_at'] = $now;
            $item['updated_at'] = $now;
        }

        DB::table('ingredients')->insert($items);
    }
}
