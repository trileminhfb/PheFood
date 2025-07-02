<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoiceFoodSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $invoiceFoods = [
            1 => [1, 2, 3],
            2 => [1, 3],
            3 => [2],
        ];

        $data = [];

        foreach ($invoiceFoods as  $invoiceId => $foodId) {
            foreach ($foodId as $foodId) {
                $data[] = [
                    'ID_Food' => $foodId,
                    'ID_Invoice' => $invoiceId,
                    'Amount' => random_int(1, 10),
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }

        DB::table('invoices__foods')->insert($data);
    }
}
