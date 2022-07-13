<?php

namespace Database\Factories;

use App\Models\Card;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'card_id' => function() {
                if($card = Card::inRandomOrder()->first())
                    return $card->id;
             },
            'amount' => rand(1000,50000000),
            'destination_card' => function() {
                if($card = Card::inRandomOrder()->first())
                    return $card->id;
            },
            'wage' => 500,
        ];
    }

}
