<?php declare(strict_types=1);

namespace App\Presenter;


use Polidog\TransferMoneyManagement\DataAccess\AccountDataInterface;
use Polidog\TransferMoneyManagement\UseCase\TransferMoney\Presenter;
use Polidog\TransferMoneyManagement\UseCase\TransferMoney\Output;

class TransferMoneyPresenter implements Presenter
{
    /**
     * @var Output
     */
    private $output;

    public function setOutputData(Output $output): void
    {
        $this->output = $output;
    }

    public function getSource()
    {
        return $this->accountDataToArray($this->output->getSource());
    }

    public function getDestination()
    {
        return $this->accountDataToArray($this->output->getDestination());
    }

    public function getMoney(): int
    {
        return $this->output->getMoney();
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