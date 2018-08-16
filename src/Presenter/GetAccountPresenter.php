<?php declare(strict_types=1);

namespace App\Presenter;


use Polidog\TransferMoneyManagement\UseCase\GetAccount\Presenter;

class GetAccountPresenter implements Presenter
{
    private $data;

    public function setAccount(array $accountData): void
    {
        $this->data = $accountData;
    }

    public function getAccount()
    {
        return $this->data;
    }

}