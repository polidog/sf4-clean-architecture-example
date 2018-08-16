<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\UseCase\GetAccount;


use App\Repository\AccountRepository;

class UseCase implements GetAccount
{
    /**
     * @var AccountRepository
     */
    private $repository;

    /**
     * UseCase constructor.
     * @param AccountRepository $repository
     */
    public function __construct(AccountRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(string $number, Presenter $presenter): void
    {
        $account = $this->repository->findAccount($number);
        $presenter->setAccount([
            'number' => $account->getNumber(),
            'name' => $account->getNumber(),
            'money' => $account->getMoney(),
        ]);
    }

}