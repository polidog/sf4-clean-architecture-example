<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\UseCase\CreateAccount;

use App\Repository\AccountRepository;
use Polidog\TransferMoneyManagement\Model\Factory\AccountFactory;

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

    /**
     * UseCase constructor.
     * @param AccountRepository $repository
     * @param AccountFactory $factory
     */
    public function __construct(AccountRepository $repository, AccountFactory $factory)
    {
        $this->repository = $repository;
        $this->factory = $factory;
    }

    public function execute(string $name, Presenter $presenter): void
    {
        $account = $this->factory->create($name);
        $this->repository->create($account);
        $presenter->setAccount((array)$account);
    }

}