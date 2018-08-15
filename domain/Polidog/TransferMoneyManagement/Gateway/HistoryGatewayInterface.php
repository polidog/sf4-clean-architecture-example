<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\Gateway;


use Polidog\TransferMoneyManagement\DataAccess\AccountDataInterface;
use Polidog\TransferMoneyManagement\DataAccess\HistoryDataInterface;

interface HistoryGatewayInterface
{
    public function create(AccountDataInterface $source, AccountDataInterface $destination, \DateTimeImmutable $createdAt) : HistoryDataInterface;
}