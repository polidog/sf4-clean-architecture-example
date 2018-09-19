<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\Application;


use Polidog\TransferMoneyManagement\Model\AccountNumber;
use Polidog\TransferMoneyManagement\Model\AccountRepository;
use Polidog\TransferMoneyManagement\Model\HistoryRepository;
use Polidog\TransferMoneyManagement\Model\Money;
use Polidog\TransferMoneyManagement\Model\Transaction;
use Polidog\TransferMoneyManagement\UseCase\TransferMoney\Request;
use Polidog\TransferMoneyManagement\UseCase\TransferMoney\Response;
use Polidog\TransferMoneyManagement\UseCase\TransferMoney\TransferMoney;

class TransferMoneyInteractor implements TransferMoney
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
     * TransferMoneyInteractor constructor.
     * @param AccountRepository $accountRepository
     * @param HistoryRepository $historyRepository
     */
    public function __construct(AccountRepository $accountRepository, HistoryRepository $historyRepository)
    {
        $this->accountRepository = $accountRepository;
        $this->historyRepository = $historyRepository;
    }

    public function handle(Request $request): Response
    {
        $source = $this->accountRepository->findAccount(new AccountNumber($request->getSourceNumber()));
        $destination = $this->accountRepository->findAccount(new AccountNumber($request->getDestinationNumber()));
        $money = new Money($request->getMoney());
        $history = (new Transaction($source, $destination))->transfer($money);

        // TODO data store transaction.
        $this->accountRepository->save($source);
        $this->accountRepository->save($destination);
        $this->historyRepository->save($history);

        return new Response(
            [
                'number' => (string)$source->getNumber(),
                'balance' => $source->getBalance()->getValue(),
                'name' => $source->getName(),
            ],
            [
                'number' => (string)$destination->getNumber(),
                'balance' => $destination->getBalance()->getValue(),
                'name' => $destination->getName(),
            ],
            $money->getValue()
        );
    }

}