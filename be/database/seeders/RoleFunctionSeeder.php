<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleFunctionSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $roleFunctions = [
            1 => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
            2 => [1, 2, 3, 4, 5, 7, 8, 9, 10],
            3 => [2, 3],
        ];

        $data = [];

        foreach ($roleFunctions as $roleId => $functions) {
            foreach ($functions as $functionId) {
                $data[] = [
                    'ID_Role' => $roleId,
                    'ID_Function' => $functionId,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }

        DB::table('roles__functions')->insert($data);
    }
}
