<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\Model\EntityFactory;


use Polidog\TransferMoneyManagement\Model\Entity\Account;

class AccountFactory
{
    /**
     * @throws \Exception
     */
    public function create(string $name) : Account
    {
        $number = bin2hex(\random_bytes(16)); // TODO change account create logic
        return $this->fromData($number, $name, 0);
    }

    public function fromData(string $number, string $name, int $money) : Account
    {
        return new Account($number, $name, $money);
    }
}