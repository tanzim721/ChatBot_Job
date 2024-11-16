<?php

namespace Database\Seeders;

use App\Models\CareerJob;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CareerJobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creative::factory()->count(10)->create();
        CareerJob::factory(5)->count(5)->create();
    }
}
