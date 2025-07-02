<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Enums\Bookings\StatusBookings;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $items = [
            [
                'ID_Customer' => 1,
                'Time' => Carbon::now()->addDays(1)->setTime(18, 30),
                'Status' => StatusBookings::PENDING,
            ],
            [
                'ID_Customer' => 2,
                'Time' => Carbon::now()->addDays(2)->setTime(12, 0),
                'Status' => StatusBookings::SUCCESS,
            ],
            [
                'ID_Customer' => 2,
                'Time' => Carbon::now()->addDays(2)->setTime(12, 0),
                'Status' => StatusBookings::REJECT,
            ],
            [
                'ID_Customer' => 1,
                'Time' => Carbon::now()->subDays(1)->setTime(19, 0),
                'Status' => StatusBookings::CANCELLED,
            ],
        ];

        foreach ($items as &$item) {
            $item['created_at'] = $now;
            $item['updated_at'] = $now;
            $item['Amount'] = random_int(2, 10);
        }

        DB::table('bookings')->insert($items);
    }
}
