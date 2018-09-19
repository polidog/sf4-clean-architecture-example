<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\Model;

/**
 * Entity
 */
class History
{
    /**
     * @var Account
     */
    private $source;

    /**
     * @var Account
     */
    private $destination;

    /**
     * @var Money
     */
    private $amount;

    /**
     * @var \DateTimeImmutable
     */
    private $createdAt;

    /**
     * History constructor.
     * @param Account $source
     * @param Account $destination
     * @param Money $money
     * @param \DateTimeImmutable $createdAt
     */
    public function __construct(Account $source, Account $destination, Money $money, \DateTimeImmutable $createdAt)
    {
        $this->source = $source;
        $this->destination = $destination;
        $this->amount = $money;
        $this->createdAt = $createdAt;
    }

    /**
     * @return Account
     */
    public function getSource(): Account
    {
        return $this->source;
    }

    /**
     * @return Account
     */
    public function getDestination(): Account
    {
        return $this->destination;
    }

    /**
     * @return Money
     */
    public function getAmount(): Money
    {
        return $this->amount;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

}