<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryFoodSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $categoryFoods = [
            1 => [1, 4, 5],
            2 => [1, 5],
            3 => [2, 3],
        ];

        $data = [];

        foreach ($categoryFoods as $foodId => $category) {
            foreach ($category as $categoryId) {
                $data[] = [
                    'ID_Food' => $foodId,
                    'ID_Category' => $categoryId,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }

        DB::table('categories__foods')->insert($data);
    }
}
