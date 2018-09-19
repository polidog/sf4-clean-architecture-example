<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\UseCase\GetAccount;


interface GetAccount
{
    public function handle(Request $request): Response;
}