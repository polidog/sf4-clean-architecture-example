<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\Model;

use Polidog\TransferMoneyManagement\Model\Account;

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
     * @var \DateTimeImmutable
     */
    private $createdAt;

    /**
     * History constructor.
     * @param Account $source
     * @param Account $destination
     * @param \DateTimeImmutable $createdAt
     */
    public function __construct(Account $source, Account $destination, \DateTimeImmutable $createdAt)
    {
        $this->source = $source;
        $this->destination = $destination;
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
     * @return \DateTimeImmutable
     */
    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

}