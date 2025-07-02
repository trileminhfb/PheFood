<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RankSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $items = [
            ['Name' => 'Đồng', 'Image' => 'bronze.png',],
            ['Name' => 'Bạc', 'Image' => 'silver.png',],
            ['Name' => 'Vàng', 'Image' => 'gold.png',],
            ['Name' => 'Kim cương', 'Image' => 'diamond.png',],
        ];

        foreach ($items as &$item) {
            $item['created_at'] = $now;
            $item['updated_at'] = $now;
            $percent = 0;
            $item['Percent'] = $percent + 1;
            $points = 0;
            $item['Points'] = $points + 1000;
        }

        DB::table('ranks')->insert($items);
    }
}
