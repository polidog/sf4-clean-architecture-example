<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\UseCase\TransferMoney;

/**
 * Input Boundary
 */
interface TransferMoney
{
    public function handle(Request $request): Response;
}