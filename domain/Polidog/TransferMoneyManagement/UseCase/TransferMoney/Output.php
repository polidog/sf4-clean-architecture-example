<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\UseCase\TransferMoney;


use Polidog\TransferMoneyManagement\DataAccess\AccountDataInterface;

/**
 * Output Data
 */
class Output
{
    /**
     * @var AccountDataInterface
     */
    private $source;

    /**
     * @var AccountDataInterface
     */
    private $destination;

    /**
     * @var integer
     */
    private $money;

    public function __construct(AccountDataInterface $source, AccountDataInterface $destination, int $money)
    {
        $this->source = $source;
        $this->destination = $destination;
        $this->money = $money;
    }

    public function getSource(): AccountDataInterface
    {
        return $this->source;
    }

    public function getDestination(): AccountDataInterface
    {
        return $this->destination;
    }

    public function getMoney(): int
    {
        return $this->money;
    }

}