<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingFoodSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $BookingFoods = [
            1 => [1, 2, 3],
            2 => [1, 3],
            3 => [2],
        ];

        $data = [];

        foreach ($BookingFoods as  $BookingId => $foodId) {
            foreach ($foodId as $foodId) {
                $data[] = [
                    'ID_Food' => $foodId,
                    'ID_Booking' => $BookingId,
                    'Amount' => random_int(1, 10),
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }

        DB::table('bookings__foods')->insert($data);
    }
}
