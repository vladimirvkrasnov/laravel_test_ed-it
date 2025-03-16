<?php

namespace Database\Seeders;

use Composer\Semver\Interval;
use Database\Factories\IntervalsFactory;
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
