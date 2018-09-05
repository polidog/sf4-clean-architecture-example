<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\UseCase\TransferMoney;


use Polidog\TransferMoneyManagement\UseCase\TransferMoney\Presenter;
use Polidog\TransferMoneyManagement\UseCase\TransferMoney\Request;

/**
 * Input Boundary
 */
interface TransferMoney
{
    public function execute(Request $request): void;
}