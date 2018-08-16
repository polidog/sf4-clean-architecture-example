<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\UseCase\CreateAccount;


use App\Repository\AccountRepository;
use Polidog\TransferMoneyManagement\Gateway\AccountGatewayInterface;
use Polidog\TransferMoneyManagement\Model\EntityFactory\AccountFactory;

class UseCase implements CreateAccount
{
    /**
     * @var AccountRepository
     */
    private $repository;

    /**
     * @var AccountFactory
     */
    private $factory;

    public function execute(string $name, Presenter $presenter): void
    {
        $account = $this->factory->create($name);
        $this->repository->create($account);
        $presenter->setAccount((array)$account);
    }

}