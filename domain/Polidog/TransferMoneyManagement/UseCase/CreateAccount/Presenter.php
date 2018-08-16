<?php declare(strict_types=1);


namespace Polidog\TransferMoneyManagement\UseCase\CreateAccount;

interface Presenter
{
    public function setAccount(array $accountData);
}