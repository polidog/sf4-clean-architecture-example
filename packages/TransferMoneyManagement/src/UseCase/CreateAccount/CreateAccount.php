<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\UseCase\CreateAccount;


interface CreateAccount
{
    public function handle(Request $request) : Response;
}