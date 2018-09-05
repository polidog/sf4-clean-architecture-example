<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\UseCase\CreateAccount;

use App\DataAccess\AccountDataAccess;
use Polidog\TransferMoneyManagement\Model\AccountFactory;

class UseCase implements CreateAccount
{
    /**
     * @var AccountDataAccess
     */
    private $repository;

    /**
     * @var AccountFactory
     */
    private $factory;

    /**
     * @var Presenter
     */
    private $presenter;

    /**
     * UseCase constructor.
     * @param AccountDataAccess $repository
     * @param AccountFactory $factory
     * @param Presenter $presenter
     */
    public function __construct(AccountDataAccess $repository, AccountFactory $factory, Presenter $presenter)
    {
        $this->repository = $repository;
        $this->factory = $factory;
        $this->presenter = $presenter;
    }

    /**
     * @param Request $request
     * @throws \Exception
     */
    public function handle(Request $request): void
    {
        $account = $this->factory->create($request->name());
        $this->repository->create($account);
        $this->presenter->setAccount(new Response($account->getNumber(), $account->getName(), $account->getMoney()));
    }

}