<?php declare(strict_types=1);

namespace Polidog\TransferMoney\Entity;


use Polidog\TransferMoney\Data\AccountDataInterface;

class Account
{
    /**
     * @var AccountDataInterface
     */
    private $data;

    public function __construct(AccountDataInterface $data)
    {
        $this->data = $data;
    }

    public function transfer(self $account, int $money) : void
    {
        $this->data->withdraw($money);
        $account->deposit($money);
    }

    public function deposit(int $money) : void
    {
        $this->data->deposit($money);
    }

}