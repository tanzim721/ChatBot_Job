<?php

namespace Database\Factories;

use App\Enums\EmploymentType;
use Illuminate\Support\Number;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CareerJob>
 */
class CareerJobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->realText(50),
            'employment_type' => fake()->randomElement(EmploymentType::cases()),
            'company_name' => fake()-> company(),
            'role' => fake()->jobTitle(),
            'apply_url' => fake()->url(),
            'company_logo' => fake()->imageUrl(100, 100),
            'description' => fake()->realText(500),
            'salary' => fake()->numberBetween(1000, 10000),
        ];
    }
}
