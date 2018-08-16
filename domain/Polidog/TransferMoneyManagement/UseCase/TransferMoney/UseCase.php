<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\UseCase\TransferMoney;


use Polidog\TransferMoneyManagement\Model\Repository\AccountRepository;
use Polidog\TransferMoneyManagement\Model\Repository\HistoryRepository;

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
     * @var HistoryRepository
     */
    private $historyRepository;

    /**
     * UseCase constructor.
     * @param AccountRepository $accountRepository
     * @param HistoryRepository $historyRepository
     */
    public function __construct(AccountRepository $accountRepository, HistoryRepository $historyRepository)
    {
        $this->accountRepository = $accountRepository;
        $this->historyRepository = $historyRepository;
    }

    /**
     * @throws \Exception
     */
    public function execute(Input $input, Presenter $presenter): void
    {
        $source = $this->accountRepository->findAccount($input->getSourceNumber());
        $destination = $this->accountRepository->findAccount($input->getDestinationNumber());
        $history = $source->transfer($destination, $input->getMoney());

        $this->accountRepository->update($source);
        $this->accountRepository->update($destination);
        $this->historyRepository->add($history);
        $presenter->setOutputData(new Output($source, $destination, $input->getMoney()));
    }

}