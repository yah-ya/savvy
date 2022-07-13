<?php
namespace App\Repositories;

use App\Models\Transaction;

class TransactionRepository {

    public function create($card,$destinationCard,$amount,$wage)
    {
        $transaction = new Transaction();
        $transaction->card_id = $card->id;
        $transaction->amount = $amount;
        $transaction->destination_card = $destinationCard->id;
        $transaction->wage = $wage;
        $transaction->save();

        return $transaction;
    }
}
