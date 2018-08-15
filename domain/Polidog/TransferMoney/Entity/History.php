<?php declare(strict_types=1);

namespace Polidog\TransferMoney\Entity;


use Polidog\TransferMoney\DataAccess\HistoryDataInterface;

class History
{
    /**
     * @var HistoryDataInterface
     */
    private $data;

    /**
     * History constructor.
     * @param HistoryDataInterface $data
     */
    public function __construct(HistoryDataInterface $data)
    {
        $this->data = $data;
    }

    public function getSource() : Account
    {
        return new Account($this->data->getSource());
    }

    public function getDestination() : Account
    {
        return new Account($this->data->getSource());
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->data->getCreatedAt();
    }

}