<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $items = [
            ['Name' => 'Món ăn',],
            ['Name' => 'Thức uống',],
        ];

        foreach ($items as &$item) {
            $item['created_at'] = $now;
            $item['updated_at'] = $now;
        }

        DB::table('types')->insert($items);
    }
}
