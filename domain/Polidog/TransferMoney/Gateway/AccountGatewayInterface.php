<?php declare(strict_types=1);


namespace Polidog\TransferMoney\Gateway;


use Polidog\TransferMoney\Data\AccountDataInterface;

interface AccountGatewayInterface
{
    public function findAccount(string $number): AccountDataInterface;

    public function create(AccountDataInterface $data);

    public function save(AccountDataInterface $data);
}