<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $items = [
            ['Name' => 'Truyền thống', 'ID_Type' => 1],
            ['Name' => 'Nước ngoài', 'ID_Type' => 1],
            ['Name' => 'Cơm', 'ID_Type' => 1],
            ['Name' => 'Bún', 'ID_Type' => 1],
            ['Name' => 'Mỳ', 'ID_Type' => 1],
            ['Name' => 'Bia', 'ID_Type' => 2],
            ['Name' => 'Nước Ngọt', 'ID_Type' => 2],
        ];

        foreach ($items as &$item) {
            $item['created_at'] = $now;
            $item['updated_at'] = $now;
        }

        DB::table('categories')->insert($items);
    }
}
