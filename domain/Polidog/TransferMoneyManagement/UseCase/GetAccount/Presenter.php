<?php declare(strict_types=1);


namespace Polidog\TransferMoneyManagement\UseCase\GetAccount;


use Polidog\TransferMoneyManagement\DataAccess\AccountDataInterface;

interface Presenter
{
    public function setAccount(AccountDataInterface $accountData);
}