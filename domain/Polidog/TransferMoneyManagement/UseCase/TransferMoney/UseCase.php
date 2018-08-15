<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\UseCase\TransferMoney;


use Polidog\TransferMoneyManagement\Entity\Account;
use Polidog\TransferMoneyManagement\Gateway\AccountGatewayInterface;
use Polidog\TransferMoneyManagement\Gateway\HistoryGatewayInterface;
use Polidog\TransferMoneyManagement\UseCase\TransferMoney\Presenter;
use Polidog\TransferMoneyManagement\UseCase\TransferMoney\Input;
use Polidog\TransferMoneyManagement\UseCase\TransferMoney\Output;
use Polidog\TransferMoneyManagement\UseCase\TransferMoney\TransferMoney;

/**
 * UseCase Interactor
 */
class UseCase implements TransferMoney
{
    /**
     * @var AccountGatewayInterface
     */
    private $accountGateway;

    /**
     * @var HistoryGatewayInterface
     */
    private $historyGateway;

    public function __construct(AccountGatewayInterface $accountGateway, HistoryGatewayInterface $historyGateway)
    {
        $this->accountGateway = $accountGateway;
        $this->historyGateway = $historyGateway;
    }

    /**
     * @throws \Exception
     */
    public function execute(Input $input, Presenter $presenter): void
    {
        $sourceData = $this->accountGateway->findAccount($input->getSourceNumber());
        $destinationData = $this->accountGateway->findAccount($input->getDestinationNumber());

        $source = new Account($sourceData);
        $destination = new Account($destinationData);

        $destination->transfer($source, $input->getMoney());

        // TODO: transaction
        $this->accountGateway->update($sourceData);
        $this->accountGateway->update($destinationData);
        $this->historyGateway->create($sourceData, $destinationData, new \DateTimeImmutable());

        $presenter->setOutputData(new Output($sourceData, $destinationData, $input->getMoney()));
    }

}