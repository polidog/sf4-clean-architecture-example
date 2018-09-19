<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\Application;


use Polidog\TransferMoneyManagement\Model\Account;
use Polidog\TransferMoneyManagement\Model\AccountNumber;
use Polidog\TransferMoneyManagement\Model\AccountRepository;
use Polidog\TransferMoneyManagement\Model\Money;
use Polidog\TransferMoneyManagement\UseCase\CreateAccount\CreateAccount;
use Polidog\TransferMoneyManagement\UseCase\CreateAccount\Request;
use Polidog\TransferMoneyManagement\UseCase\CreateAccount\Response;

class CreateAccountInteractor implements CreateAccount
{
    /**
     * @var AccountRepository
     */
    private $repository;

    /**
     * CreateAccountInteractor constructor.
     * @param AccountRepository $repository
     */
    public function __construct(AccountRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(Request $request): Response
    {
        $account = new Account(AccountNumber::create(), new Money(0), $request->name());
        $this->repository->save($account);

        return new Response((string)$account->getNumber(), $account->getName(), $account->getBalance()->getValue());
    }

}