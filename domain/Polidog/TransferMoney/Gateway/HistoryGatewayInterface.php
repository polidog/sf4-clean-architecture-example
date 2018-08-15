<?php declare(strict_types=1);

namespace Polidog\TransferMoney\Gateway;


use Polidog\TransferMoney\DataAccess\AccountDataInterface;
use Polidog\TransferMoney\DataAccess\HistoryDataInterface;
use Polidog\TransferMoney\Entity\History;

interface HistoryGatewayInterface
{
    public function create(AccountDataInterface $source, AccountDataInterface $destination, \DateTimeImmutable $createdAt) : HistoryDataInterface;
}