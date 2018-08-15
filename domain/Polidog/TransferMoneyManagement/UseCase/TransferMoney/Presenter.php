<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\UseCase\TransferMoney;

interface Presenter
{
    public function setOutputData(Output $output);
}