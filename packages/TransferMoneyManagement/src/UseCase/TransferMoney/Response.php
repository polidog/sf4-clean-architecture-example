<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\UseCase\TransferMoney;

use Polidog\TransferMoneyManagement\Model\Account;

/**
 * Output Data
 */
class Response
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
     * @var integer
     */
    private $money;

    public function __construct(Account $source, Account $destination, int $money)
    {
        $this->source = $source;
        $this->destination = $destination;
        $this->money = $money;
    }

    public function getSource(): array
    {
        return $this->exportAccount($this->source);
    }

    public function getDestination(): array
    {
        return $this->exportAccount($this->destination);
    }

    public function getMoney(): int
    {
        return $this->money;
    }

    private function exportAccount(Account $account)
    {
        return [
            'number' => $account->getNumber(),
            'name' => $account->getName(),
            'money' => $account->getMoney(),
        ];
    }

}