<?php

namespace App\Http\Controllers;

use App\Events\TransferComplete;
use App\Http\Requests\TransferRequest;
use App\Repositories\AccountRepository;
use App\Repositories\CardRepository;
use App\Repositories\TransactionRepository;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    const WAGE = 500;

    // @var \App\Repositories\CardRepository
    protected CardRepository $cardRepository;

    // @var \App\Repositories\TransactionRepository
    protected TransactionRepository $transactionRepository;

    // @var \App\Repositories\AccountRepository
    protected AccountRepository $accountRepository;

    public function __construct(CardRepository $cardRepository,TransactionRepository $transactionRepository, AccountRepository $accountRepository)
    {
        $this->cardRepository = $cardRepository;
        $this->transactionRepository = $transactionRepository;
        $this->accountRepository = $accountRepository;
    }

    public function transfer(TransferRequest $req)
    {
        $card = $this->cardRepository->get($req->card);
        $destinationCard = $this->cardRepository->get($req->destinationCard);
        if(!$card || !$destinationCard){
            return response()->json(['res'=>false,'msg'=>'cards not found']);
        }

        if($card->account->amount >= $req->amount + self::WAGE )
        {
            $transaction = $this->transactionRepository->create($card,$destinationCard,$req->amount,self::WAGE);

            $this->accountRepository->updateAmount($card->account, $card->account->amount - ($req->amount + self::WAGE));
            $this->accountRepository->updateAmount($destinationCard->account, $card->account->amount + $req->amount);

            TransferComplete::dispatch($transaction);
            return response()->json(['res'=>true]);
        }
        return response()->json(['res'=>false]);
    }
}
