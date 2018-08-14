<?php declare(strict_types=1);

namespace Polidog\TransferMoney\UseCase;


class TransferMoneyInput
{
    /**
     * @var string
     */
    private $sourceNumber;

    /**
     * @var string
     */
    private $destinationNumber;

    /**
     * @var integer
     */
    private $money;

    /**
     * TransferMoneyRequest constructor.
     * @param string $sourceNumber
     * @param string $destinationNumber
     * @param int $money
     */
    public function __construct(string $sourceNumber, string $destinationNumber, int $money)
    {
        $this->sourceNumber = $sourceNumber;
        $this->destinationNumber = $destinationNumber;
        $this->money = $money;
    }

    /**
     * @return string
     */
    public function getSourceNumber(): string
    {
        return $this->sourceNumber;
    }

    /**
     * @return string
     */
    public function getDestinationNumber(): string
    {
        return $this->destinationNumber;
    }

    /**
     * @return int
     */
    public function getMoney(): int
    {
        return $this->money;
    }


}