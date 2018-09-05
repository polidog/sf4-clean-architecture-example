<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\UseCase\GetAccount;


use App\DataAccess\AccountDataAccess;

class UseCase implements GetAccount
{
    /**
     * @var AccountDataAccess
     */
    private $repository;

    /**
     * @var Presenter
     */
    private $presenter;

    /**
     * UseCase constructor.
     * @param AccountDataAccess $repository
     * @param Presenter $presenter
     */
    public function __construct(AccountDataAccess $repository, Presenter $presenter)
    {
        $this->repository = $repository;
        $this->presenter = $presenter;
    }

    public function execute(Request $request): void
    {
        $account = $this->repository->findAccount($request->number());
        $this->presenter->setAccount(new Response($account->getNumber(), $account->getName(), $account->getMoney()));
    }

}