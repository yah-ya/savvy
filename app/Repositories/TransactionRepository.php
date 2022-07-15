<?php
namespace App\Repositories;

use App\Models\Transaction;
use Carbon\Carbon;

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

    public function takeTop($total,$recentMinutes)
    {
        return Transaction::selectRaw('count(*) as total,cards.id as card_id,users.mobile,users.id as user_id')
            ->groupBy('card_id')
            ->orderBy('total','DESC')
            ->where('transactions.created_at','>',Carbon::now()->subMinutes($recentMinutes)->toDateTimeString())
            ->take($total)
            ->leftJoin('cards','cards.id','=','transactions.card_id')
            ->leftJoin('accounts','accounts.id','=','cards.account_id')
            ->leftJoin('users','users.id','=','accounts.user_id')
            ->get();
    }

    public function getByCardId($cardId, $total)
    {
        return Transaction::where('card_id',$cardId)->take($total)->get();
    }
}
