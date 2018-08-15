<?php declare(strict_types=1);


namespace Polidog\TransferMoney\Gateway;


use Polidog\TransferMoney\DataAccess\AccountDataInterface;

interface AccountGatewayInterface
{
    public function findAccount(string $number): AccountDataInterface;

    public function create(AccountDataInterface $data);

    public function update(AccountDataInterface $data);
}