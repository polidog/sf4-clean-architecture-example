<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\Model;


interface HistoryRepository
{
    public function save(History $history): void;
}