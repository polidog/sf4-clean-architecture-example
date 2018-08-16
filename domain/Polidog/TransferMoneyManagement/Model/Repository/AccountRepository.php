<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\Model\Repository;


use Polidog\TransferMoneyManagement\Model\Entity\Account;

interface AccountRepository
{
    public function findAccount(string $number): Account;

    public function create(Account $account);

    public function update(Account $account);

    public function delete(Account $account);
}