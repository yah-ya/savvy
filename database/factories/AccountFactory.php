<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => function() {
                if($user = User::inRandomOrder()->first())
                    return $user->id;
             },
            'amount' => fake()->randomNumber(),
            'account_number' => fake()->unique()->randomNumber(),
        ];
    }

}
