<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\UseCase\TransferMoney;

/**
 * Input Data
 */
class Input
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

    public function __construct(string $sourceNumber, string $destinationNumber, int $money)
    {
        $this->sourceNumber = $sourceNumber;
        $this->destinationNumber = $destinationNumber;
        $this->money = $money;
    }

    public function getSourceNumber(): string
    {
        return $this->sourceNumber;
    }

    public function getDestinationNumber(): string
    {
        return $this->destinationNumber;
    }

    public function getMoney(): int
    {
        return $this->money;
    }


}