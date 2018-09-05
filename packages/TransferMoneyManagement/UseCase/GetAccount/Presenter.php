<?php declare(strict_types=1);


namespace Polidog\TransferMoneyManagement\UseCase\GetAccount;

interface Presenter
{
    public function setAccount(Response $response);
}