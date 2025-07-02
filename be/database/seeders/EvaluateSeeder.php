<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EvaluateSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $items = [
            [
                'ID_Food' => 1,
                'ID_Customer' => 1,
                'Image' => 'eval1.jpg',
                'Comment' => 'Món ăn rất ngon, nêm nếm vừa miệng.',
            ],
            [
                'ID_Food' => 2,
                'ID_Customer' => 2,
                'Image' => 'eval1.jpg',
                'Comment' => 'Tạm ổn nhưng giao hàng hơi chậm.',
            ],
            [
                'ID_Food' => 1,
                'ID_Customer' => 2,
                'Image' => 'eval1.jpg',
                'Comment' => 'Xuất sắc, sẽ đặt lại lần nữa!',
            ],
        ];

        foreach ($items as &$item) {
            $item['created_at'] = $now;
            $item['updated_at'] = $now;
            $item['Stars'] = mt_rand(25, 50) / 10;
        }

        DB::table('evaluates')->insert($items);
    }
}
