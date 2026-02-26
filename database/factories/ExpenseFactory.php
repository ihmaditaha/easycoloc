<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
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
            'amount' => $this->faker->randomFloat(0, 10, 1000),
            'user_id' => rand(1,50),
            'payer_id' => rand(1,50),
            'colocation_id' => rand(0,10),
            'categorie_id' => rand(0,50),
            'payment_status' => $this->faker->randomElement(['unpaid', 'paid']),
        ];
    }
}
