<?php

namespace Database\Factories;

use App\Models\Colocation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => $this->faker->randomElement(['Rent','Vegetables', 'fruits', 'Electricity', 'Water', 'WiFi', 'Cleaning Supplies', 'Misc']),
            'colocation_id' => rand(0,10),
        ];
    }
}
