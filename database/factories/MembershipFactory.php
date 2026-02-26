<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Membership>
 */
class MembershipFactory extends Factory
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
            'user_id' => rand(1,50),
            'colocation_id' => rand(1,10),
            'role' => $this->faker->randomElement(['member', 'owner']), 
            'created_at' => now(),
        ];
    }
}
