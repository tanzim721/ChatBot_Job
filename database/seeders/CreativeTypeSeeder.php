<?php

namespace Database\Seeders;

use App\Models\CreativeType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreativeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CreativeType::factory()->count(4)->create();
    }
}
