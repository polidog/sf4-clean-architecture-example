<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\UseCase\GetAccount;


class Response
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
     * Response constructor.
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

}