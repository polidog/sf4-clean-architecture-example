<?php declare(strict_types=1);

namespace Polidog\TransferMoney\Entity;


use Polidog\TransferMoney\DataAccess\AccountDataInterface;

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

    /**
     * @throws \Exception
     */
    public function transfer(self $source, int $money) : void
    {
        $this->data->withdraw($money);
        $source->deposit($money);
    }

    public function deposit(int $money) : void
    {
        $this->data->deposit($money);
    }

}