<?php declare(strict_types=1);

namespace Polidog\TransferMoney\DataAccess;


interface HistoryDataInterface
{
    public function getSource() : AccountDataInterface;

    public function getDestination() : AccountDataInterface;

    public function getCreatedAt() : \DateTimeImmutable;
}