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

    /**
     * TransferMoneyOutput constructor.
     * @param array $source
     * @param array $destination
     * @param int $money
     */
    public function __construct(AccountDataInterface $source, AccountDataInterface $destination, int $money)
    {
        $this->source = $source;
        $this->destination = $destination;
        $this->money = $money;
    }

    /**
     * @return AccountDataInterface
     */
    public function getSource(): AccountDataInterface
    {
        return $this->source;
    }

    /**
     * @return AccountDataInterface
     */
    public function getDestination(): AccountDataInterface
    {
        return $this->destination;
    }

    /**
     * @return int
     */
    public function getMoney(): int
    {
        return $this->money;
    }

}