<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Enums\Invoices\StatusInvoices;

class InvoiceSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $items = [
            [
                'ID_Table' => 1,
                'ID_User' => 1,
                'ID_Customer' => 1,
                'ID_Sale' => 1,
                'Status' => StatusInvoices::PENDING,
            ],
            [
                'ID_Table' => 2,
                'ID_User' => 2,
                'ID_Customer' => 2,
                'ID_Sale' => 2,
                'Status' => StatusInvoices::SUCCESS,
            ],
            [
                'ID_Table' => 1,
                'ID_User' => 1,
                'ID_Customer' => 2,
                'ID_Sale' => 1,
                'Status' => StatusInvoices::CANCELLED,
            ],
        ];

        foreach ($items as &$item) {
            $item['created_at'] = $now;
            $item['updated_at'] = $now;
            $item['Total'] = random_int(50, 1000) * 1000;
        }

        DB::table('invoices')->insert($items);
    }
}
