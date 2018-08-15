<?php

namespace Polidog\TransferMoneyManagement\UseCase\GetAccount;


use Polidog\TransferMoneyManagement\Gateway\AccountGatewayInterface;

class UseCase implements GetAccount
{
    /**
     * @var AccountGatewayInterface
     */
    private $gateway;

    /**
     * UseCase constructor.
     * @param AccountGatewayInterface $gateway
     */
    public function __construct(AccountGatewayInterface $gateway)
    {
        $this->gateway = $gateway;
    }

    public function execute(string $number, Presenter $presenter): void
    {
        $account = $this->gateway->findAccount($number);
        $presenter->setAccount($account);
    }

}