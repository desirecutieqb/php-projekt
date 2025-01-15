<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reservation;

class ReservationSeeder extends Seeder
{
    public function run()
    {
        $reservations = [
            ['book_id' => 1, 'member_id' => 1, 'reservation_date' => now(), 'status' => 'pending'],
            ['book_id' => 2, 'member_id' => 2, 'reservation_date' => now(), 'status' => 'approved'],
        ];

        foreach ($reservations as $reservation) {
            Reservation::create($reservation);
        }
    }
}
