<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimeSlotsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $timeSlots = [];

        $start = strtotime('10:00 AM');
        $end = strtotime('8:00 PM');

        while ($start <= $end) {
            $timeSlots[] = date('h:i A', $start);
            $start += 30 * 60; // Increment by 30 minutes
        }

        DB::table('time_slots')->insert([
            'slots' => json_encode($timeSlots),
        ]);
    }
}
