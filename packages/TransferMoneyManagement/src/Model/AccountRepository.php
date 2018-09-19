<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\Model;


interface AccountRepository
{
    public function findAccount(AccountNumber $number): ?Account;

    public function save(Account $account): void;
}