<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\Model;

class Account
{
    /**
     * @var string
     */
    private $number;

    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $money;

    /**
     * Account constructor.
     * @param string $number
     * @param string $name
     * @param int $money
     */
    public function __construct(string $number, string $name, int $money)
    {
        $this->number = $number;
        $this->name = $name;
        $this->money = $money;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getMoney(): int
    {
        return $this->money;
    }

    /**
     * @throws \Exception
     */
    public function transfer(self $source, int $money) : History
    {
        $this->withdraw($money);
        $source->deposit($money);
        return new History($source, $this, new \DateTimeImmutable());
    }

    public function deposit(int $money) : void
    {
        $this->money += $money;
    }

    public function withdraw(int $money): void
    {
        $this->money -= $money;
        // TODO: Check money
    }
}