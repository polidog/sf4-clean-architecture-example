<?php declare(strict_types=1);

namespace Polidog\TransferMoney\UseCase;


use Polidog\TransferMoney\Entity\Account;
use Polidog\TransferMoney\Gateway\AccountGatewayInterface;
use Polidog\TransferMoney\Presenter\TransferMoneyPresenterInterface;

class TransferMoney implements TransferMoneyInterface
{
    /**
     * @var AccountGatewayInterface
     */
    private $gateway;

    /**
     * TransferMoney constructor.
     * @param AccountGatewayInterface $gateway
     */
    public function __construct(AccountGatewayInterface $gateway)
    {
        $this->gateway = $gateway;
    }

    public function execute(TransferMoneyInput $input, TransferMoneyPresenterInterface $presenter): void
    {
        // TODO: transactionをどう表現するか

        $sourceData = $this->gateway->findAccount($input->getSourceNumber());
        $destinationData = $this->gateway->findAccount($input->getDestinationNumber());

        $source = new Account($sourceData);
        $destination = new Account($destinationData);

        $destination->transfer($source, $input->getMoney());

        $this->gateway->save($sourceData);
        $this->gateway->save($destinationData);

        $presenter->setSourceData($sourceData);
        $presenter->setDestinationData($destinationData);
        $presenter->setMoney($input->getMoney());
    }

}