<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EvaluateManagerSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $items = [
            [
                'ID_User' => 1,
                'ID_Evaluate' => 1,
                'Comment' => 'Cảm ơn bạn đã phản hồi! Chúng tôi sẽ duy trì chất lượng món ăn.',
            ],
            [
                'ID_User' => 2,
                'ID_Evaluate' => 2,
                'Comment' => 'Rất tiếc vì trải nghiệm chưa tốt. Chúng tôi sẽ cải thiện dịch vụ giao hàng.',
            ],
            [
                'ID_User' => 1,
                'ID_Evaluate' => 3,
                'Comment' => 'Cảm ơn bạn đã ủng hộ, hẹn gặp lại bạn vào lần sau!',
            ],
        ];

        foreach ($items as &$item) {
            $item['created_at'] = $now;
            $item['updated_at'] = $now;
        }

        DB::table('evaluates__managers')->insert($items);
    }
}
