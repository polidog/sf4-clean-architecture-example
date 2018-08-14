<?php declare(strict_types=1);

namespace Polidog\TransferMoney\UseCase;


use Polidog\TransferMoney\Presenter\TransferMoneyPresenterInterface;

interface TransferMoneyInterface
{
    public function execute(TransferMoneyInput $input, TransferMoneyPresenterInterface $presenter): void;
}