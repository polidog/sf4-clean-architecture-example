<?php declare(strict_types=1);

namespace App\Presenter;


use Polidog\TransferMoneyManagement\DataAccess\AccountDataInterface;
use Polidog\TransferMoneyManagement\UseCase\GetAccount\Presenter;

class GetAccountPresenter implements Presenter
{
    private $data;

    public function setAccount(AccountDataInterface $accountData): void
    {
        $this->data = [
            'name' => $accountData->getName(),
            'number' => $accountData->getNumber(),
            'money' => $accountData->getMoney(),
        ];
    }


    public function getAccount()
    {
        return $this->data;
    }

}