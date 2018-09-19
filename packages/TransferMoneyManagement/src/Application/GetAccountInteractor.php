<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\Application;


use Polidog\TransferMoneyManagement\Model\AccountNumber;
use Polidog\TransferMoneyManagement\Model\AccountRepository;
use Polidog\TransferMoneyManagement\UseCase\GetAccount\GetAccount;
use Polidog\TransferMoneyManagement\UseCase\GetAccount\Request;
use Polidog\TransferMoneyManagement\UseCase\GetAccount\Response;

class GetAccountInteractor implements GetAccount
{
    /**
     * @var AccountRepository
     */
    private $repository;

    /**
     * GetAccountInteractor constructor.
     * @param AccountRepository $repository
     */
    public function __construct(AccountRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function handle(Request $request): Response
    {
        $account = $this->repository->findAccount(new AccountNumber($request->number()));
        return new Response((string)$account->getNumber(), $account->getName(), $account->getBalance()->getValue());
    }

}