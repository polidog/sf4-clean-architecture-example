<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\UseCase;


use Polidog\TransferMoneyManagement\Entity\Account;
use Polidog\TransferMoneyManagement\Gateway\AccountGatewayInterface;
use Polidog\TransferMoneyManagement\Gateway\HistoryGatewayInterface;
use Polidog\TransferMoneyManagement\Presenter\TransferMoneyPresenterInterface;
use Polidog\TransferMoneyManagement\UseCase\Data\TransferMoneyInput;
use Polidog\TransferMoneyManagement\UseCase\Data\TransferMoneyOutput;

class TransferMoney implements TransferMoneyInterface
{
    /**
     * @var AccountGatewayInterface
     */
    private $accountGateway;

    /**
     * @var HistoryGatewayInterface
     */
    private $historyGateway;

    /**
     * TransferMoney constructor.
     * @param AccountGatewayInterface $accountGateway
     * @param HistoryGatewayInterface $historyGateway
     */
    public function __construct(AccountGatewayInterface $accountGateway, HistoryGatewayInterface $historyGateway)
    {
        $this->accountGateway = $accountGateway;
        $this->historyGateway = $historyGateway;
    }

    /**
     * @throws \Exception
     */
    public function execute(TransferMoneyInput $input, TransferMoneyPresenterInterface $presenter): void
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

        $presenter->setOutputData(new TransferMoneyOutput($sourceData, $destinationData, $input->getMoney()));
    }

}