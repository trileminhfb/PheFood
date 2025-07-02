<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FunctionSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $items = [
            ['Name' => 'Quản lý người dùng', 'Code' => 'user'],
            ['Name' => 'Quản lý sản phẩm', 'Code' => 'food'],
            ['Name' => 'Quản lý khuyến mãi', 'Code' => 'sale'],
            ['Name' => 'Quản lý Rank', 'Code' => 'rank'],
            ['Name' => 'Quản lý khách hàng', 'Code' => 'customer'],
            ['Name' => 'Quản lý nhân viên', 'Code' => 'staff'],
            ['Name' => 'Quản lý đặt bàn', 'Code' => 'booking'],
            ['Name' => 'Quản lý hóa đơn', 'Code' => 'invoice'],
            ['Name' => 'Quản lý bàn', 'Code' => 'table'],
            ['Name' => 'Quản lý nhà kho', 'Code' => 'warehouse'],
        ];

        foreach ($items as &$item) {
            $item['created_at'] = $now;
            $item['updated_at'] = $now;
        }

        DB::table('functions')->insert($items);
    }
}
