<?php
namespace App\Repositories;

use App\Models\Account;

class AccountRepository {

    public function updateAmount(Account $account, $amount)
    {
        $account->amount = $amount;
        $account->save();

        return true;
    }

}
