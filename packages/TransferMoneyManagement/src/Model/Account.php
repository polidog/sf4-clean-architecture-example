<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\Model;

/**
 * Entity
 */
class Account
{
    /**
     * @var AccountNumber
     */
    private $number;

    /**
     * @var Money
     */
    private $balance;

    /**
     * @var string
     */
    private $name;

    /**
     * Account constructor.
     * @param AccountNumber $number
     * @param Money $money
     * @param string $name
     */
    public function __construct(AccountNumber $number, Money $money, string $name)
    {
        $this->number = $number;
        $this->balance = $money;
        $this->name = $name;
    }

    /**
     * @return AccountNumber
     */
    public function getNumber(): AccountNumber
    {
        return $this->number;
    }

    /**
     * @return Money
     */
    public function getBalance(): Money
    {
        return $this->balance;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function deposit(Money $money) : void
    {
        $this->balance = $this->balance->addition($money);
    }

    public function withdraw(Money $money): void
    {
        $this->balance = $this->balance->subtraction($money);
    }
}