<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Enums\Customers\StatusCustomers;
use App\Enums\Customers\ActiveCustomers;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $items = [
            [
                'name' => 'Lê Minh Anh',
                'Image' => 'customer1.jpg',
                'Phone' => '0909123456',
                'Birth' => '1995-08-20',
                'Status' => StatusCustomers::ACTIVATED,
                'is_Active' => ActiveCustomers::ACTIVATED,
                'email' => 'minhanh@example.com',
                'email_verified_at' => $now,
            ],
            [
                'name' => 'Trần Quốc Tuấn',
                'Image' => 'customer2.jpg',
                'Phone' => '0911122333',
                'Birth' => '2000-03-15',
                'Status' => StatusCustomers::PENDING,
                'is_Active' => ActiveCustomers::UNACTIVATED,
                'email' => 'quoctuan@example.com',
                'email_verified_at' => null,
            ],
        ];

        foreach ($items as &$item) {
            $item['password'] = 'abc123456';
            $item['password'] = Hash::make($item['password']);
            $item['remember_token'] = Str::random(10);
            $item['created_at'] = $now;
            $item['updated_at'] = $now;
        }
        DB::table('customers')->insert($items);
    }
}
