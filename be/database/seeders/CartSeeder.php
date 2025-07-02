<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $items = [
            ['ID_Food' => 1, 'ID_Table' => 1,],
            ['ID_Food' => 2, 'ID_Table' => 1,],
            ['ID_Food' => 3, 'ID_Table' => 2,],
            ['ID_Food' => 1, 'ID_Table' => 3,],
        ];

        foreach ($items as &$item) {
            $item['created_at'] = $now;
            $item['updated_at'] = $now;
            $item['Amount'] = random_int(1, 5);
        }

        DB::table('carts')->insert($items);
    }
}
