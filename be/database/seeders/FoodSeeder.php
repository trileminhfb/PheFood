<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $items = [
            [
                'Name' => 'Phở Bò',
                'Image_Main' => 'pho_bo_main.jpg',
                'Image' => 'pho_bo_1.jpg,pho_bo_2.jpg',
                'ID_Type' => 1,
                'Detail' => 'Phở bò truyền thống với nước dùng đậm đà.',
            ],
            [
                'Name' => 'Mỳ Quảng',
                'Image_Main' => 'mi_quang.jpg',
                'Image' => null,
                'ID_Type' => 2,
                'Detail' => 'Mỳ Quảng thơm ngon kèm nước mắm chua ngọt.',
            ],
            [
                'Name' => 'Cơm Tấm Sườn',
                'Image_Main' => 'com_tam_suon.jpg',
                'Image' => 'com_tam_1.jpg,com_tam_2.jpg',
                'ID_Type' => 1,
                'Detail' => 'Cơm tấm sườn nướng thơm ngon kèm nước mắm chua ngọt.',
            ],
        ];

        foreach ($items as &$item) {
            $item['created_at'] = $now;
            $item['updated_at'] = $now;
            $item['Cost'] = random_int(10, 50) * 1000;
        }

        DB::table('foods')->insert($items);
    }
}
