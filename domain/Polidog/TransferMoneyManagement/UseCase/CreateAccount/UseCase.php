<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\UseCase\CreateAccount;


use Polidog\TransferMoneyManagement\Gateway\AccountGatewayInterface;

class UseCase implements CreateAccount
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


    public function execute(string $name, Presenter $presenter): void
    {
        $number = bin2hex(\random_bytes(16));
        $account = $this->gateway->create($number, $name, 0);
        $presenter->setAccount($account);
    }

}