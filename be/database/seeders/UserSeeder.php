<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Enums\Users\StatusUsers;
use App\Enums\Users\ActiveUsers;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $items = [
            [
                'name' => 'Nguyễn Văn A',
                'Phone' => '0901234567',
                'Birth' => '1995-05-15',
                'Status' => StatusUsers::PENDING,
                'is_Active' => ActiveUsers::UNACTIVATED,
                'email' => 'vana@example.com',
                'email_verified_at' => $now,
            ],
            [
                'name' => 'Trần Thị B',
                'Phone' => '0912345678',
                'Birth' => '2000-08-20',
                'Status' => StatusUsers::ACTIVATED,
                'is_Active' => ActiveUsers::ACTIVATED,
                'email' => 'thib@example.com',
                'email_verified_at' => $now,
            ],
        ];

        foreach ($items as &$item) {
            $item['password'] = 'abc123456';
            $item['password'] = Hash::make($item['password']);
            $item['remember_token'] = Str::random(10);
            $item['created_at'] = $now;
            $item['updated_at'] = $now;
        }

        DB::table('users')->insert($items);
    }
}
