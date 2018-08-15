<?php declare(strict_types=1);

namespace App\Presenter;


use Polidog\TransferMoneyManagement\DataAccess\AccountDataInterface;
use Polidog\TransferMoneyManagement\Presenter\TransferMoneyPresenterInterface;
use Polidog\TransferMoneyManagement\UseCase\Data\TransferMoneyOutput;

class TransferMoneyPresenter implements TransferMoneyPresenterInterface
{
    /**
     * @var TransferMoneyOutput
     */
    private $output;

    public function setOutputData(TransferMoneyOutput $output): void
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