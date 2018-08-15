<?php

namespace Polidog\TransferMoneyManagement\UseCase\GetAccount;


interface GetAccount
{
    public function execute(string $number, Presenter $presenter): void;
}