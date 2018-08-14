<?php declare(strict_types=1);

namespace Polidog\TransferMoney\Presenter;


use Polidog\TransferMoney\Data\AccountDataInterface;

interface TransferMoneyPresenterInterface
{
    public function setSourceData(AccountDataInterface $data);

    public function setDestinationData(AccountDataInterface $data);

    public function setMoney(int $money);
}