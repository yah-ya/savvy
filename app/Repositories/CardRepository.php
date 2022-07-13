<?php
namespace App\Repositories;

use App\Models\Account;
use App\Models\Card;

class CardRepository {

    public function get(string $cardNumber)
    {
        return Card::where('card_number',$cardNumber)->first();
    }

}
