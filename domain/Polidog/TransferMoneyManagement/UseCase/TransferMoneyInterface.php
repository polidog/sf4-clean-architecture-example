<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\UseCase;


use Polidog\TransferMoneyManagement\Presenter\TransferMoneyPresenterInterface;
use Polidog\TransferMoneyManagement\UseCase\Data\TransferMoneyInput;

interface TransferMoneyInterface
{
    public function execute(TransferMoneyInput $input, TransferMoneyPresenterInterface $presenter): void;
}