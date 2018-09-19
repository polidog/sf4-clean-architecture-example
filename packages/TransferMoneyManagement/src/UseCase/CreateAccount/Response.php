<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\UseCase\CreateAccount;


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
     * @var int
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
     * @return integer
     */
    public function getMoney(): string
    {
        return $this->money;
    }

}