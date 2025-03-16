<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class IntervalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Intervals::factory()
            ->count(10000)
            ->create();
    }
}
