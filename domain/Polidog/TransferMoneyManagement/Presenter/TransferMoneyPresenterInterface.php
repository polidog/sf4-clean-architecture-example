<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\Presenter;

use Polidog\TransferMoneyManagement\UseCase\Data\TransferMoneyOutput;

interface TransferMoneyPresenterInterface
{
    public function setOutputData(TransferMoneyOutput $output);
}