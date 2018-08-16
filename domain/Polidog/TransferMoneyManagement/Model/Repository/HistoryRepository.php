<?php declare(strict_types=1);


namespace Polidog\TransferMoneyManagement\Model\Repository;


use Polidog\TransferMoneyManagement\Model\Entity\History;

interface HistoryRepository
{
    public function add(History $history);
}