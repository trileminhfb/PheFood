<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Enums\Roles\StatusRoles;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $items = [
            ['Name' => 'Quản trị viên', 'Status' => StatusRoles::ACTIVATED],
            ['Name' => 'Quản lý', 'Status' => StatusRoles::ACTIVATED],
            ['Name' => 'Nhân viên', 'Status' => StatusRoles::ACTIVATED],
            ['Name' => 'Khách hàng', 'Status' => StatusRoles::UNACTIVATED],
        ];

        foreach ($items as &$item) {
            $item['created_at'] = $now;
            $item['updated_at'] = $now;
        }

        DB::table('roles')->insert($items);
    }
}
