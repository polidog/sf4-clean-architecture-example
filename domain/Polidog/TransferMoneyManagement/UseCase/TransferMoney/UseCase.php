<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\UseCase\TransferMoney;


use Polidog\TransferMoneyManagement\Model\AccountRepository;

/**
 * UseCase Interactor
 */
class UseCase implements TransferMoney
{
    /**
     * @var AccountRepository
     */
    private $accountRepository;

    /**
     * UseCase constructor.
     * @param AccountRepository $accountRepository
     */
    public function __construct(AccountRepository $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    /**
     * @throws \Exception
     */
    public function execute(Input $input, Presenter $presenter): void
    {
        $source = $this->accountRepository->findAccount($input->getSourceNumber());
        $destination = $this->accountRepository->findAccount($input->getDestinationNumber());
        $history = $source->transfer($destination, $input->getMoney());
        $this->accountRepository->transferSave($source, $destination, $history);

        $presenter->setOutputData(new Output($source, $destination, $input->getMoney()));
    }

}