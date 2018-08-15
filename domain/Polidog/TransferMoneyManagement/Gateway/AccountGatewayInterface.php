<?php declare(strict_types=1);


namespace Polidog\TransferMoneyManagement\Gateway;


use Polidog\TransferMoneyManagement\DataAccess\AccountDataInterface;

interface AccountGatewayInterface
{
    public function findAccount(string $number): AccountDataInterface;

    public function create(string $number, string $name, int $money) : AccountDataInterface;

    public function update(AccountDataInterface $data);
}