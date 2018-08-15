<?php declare(strict_types=1);

namespace Polidog\TransferMoney\Presenter;

use Polidog\TransferMoney\UseCase\Data\TransferMoneyOutput;

interface TransferMoneyPresenterInterface
{
    public function setOutputData(TransferMoneyOutput $output);
}