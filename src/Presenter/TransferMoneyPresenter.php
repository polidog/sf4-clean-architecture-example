<?php declare(strict_types=1);

namespace App\Presenter;


use Polidog\TransferMoney\Data\AccountDataInterface;
use Polidog\TransferMoney\Presenter\TransferMoneyPresenterInterface;

class TransferMoneyPresenter implements TransferMoneyPresenterInterface
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

    public function setSourceData(AccountDataInterface $data): void
    {
        $this->source = $data;
    }

    public function setDestinationData(AccountDataInterface $data): void
    {
        $this->destination = $data;
    }

    public function setMoney(int $money): void
    {
        $this->money = $money;
    }


    public function getSource()
    {
        return $this->accountDataToArray($this->source);
    }

    public function getDestination()
    {
        return $this->accountDataToArray($this->destination);
    }

    /**
     * @return int
     */
    public function getMoney(): int
    {
        return $this->money;
    }

    private function accountDataToArray(AccountDataInterface $data)
    {
        return [
            'number' => $data->getNumber(),
            'name' => $data->getName(),
            'money' => $data->getMoney(),
        ];
    }

}