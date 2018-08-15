<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\DataAccess;


interface AccountDataInterface
{
    public function getNumber();

    public function getName();

    public function getMoney();

    public function deposit(int $money);

    public function withdraw(int $money);
}