<?php declare(strict_types=1);

namespace App\Presenter;


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

    public function getSource() : array
    {
        return $this->output->getSource();
    }

    public function getDestination() : array
    {
        return $this->output->getDestination();
    }

    public function getMoney(): int
    {
        return $this->output->getMoney();
    }

}