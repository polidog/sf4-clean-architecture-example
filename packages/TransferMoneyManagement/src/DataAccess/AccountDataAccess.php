<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\DataAccess;

use Polidog\TransferMoneyManagement\Model\Account;
use Polidog\TransferMoneyManagement\Model\History;

interface AccountDataAccess
{
    public function findAccount(string $number): Account;

    public function create(Account $account) : void;

    public function delete(Account $account) : void;

    public function transferSave(Account $source, Account $destination, History $history) : void;
}