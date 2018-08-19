<?php declare(strict_types=1);

namespace App\Domain\TransferMoneyManagement;


use App\Repository\AccountEntityRepository;
use App\Repository\HistoryEntityRepository;
use App\Entity\Account;
use Polidog\TransferMoneyManagement\Model\AccountFactory;
use Polidog\TransferMoneyManagement\Model\AccountRepository as Repository;
use Polidog\TransferMoneyManagement\Model\Account as EntityAccount;

class AccountRepository implements Repository
{
    /**
     * @var AccountEntityRepository
     */
    private $accountEntityRepository;

    /**
     * @var HistoryEntityRepository
     */
    private $historyEntityRepository;

    /**
     * @var AccountFactory
     */
    private $accountFactory;

    /**
     * AccountRepository constructor.
     * @param AccountEntityRepository $accountEntityRepository
     * @param HistoryEntityRepository $historyEntityRepository
     * @param AccountFactory $accountFactory
     */
    public function __construct(AccountEntityRepository $accountEntityRepository, HistoryEntityRepository $historyEntityRepository, AccountFactory $accountFactory)
    {
        $this->accountEntityRepository = $accountEntityRepository;
        $this->historyEntityRepository = $historyEntityRepository;
        $this->accountFactory = $accountFactory;
    }

    public function findAccount(string $number): EntityAccount
    {
        $data = $this->accountEntityRepository->findOneBy(['number' => $number]);
        if ($data instanceof Account) {
            return $this->accountFactory->fromData($data->getNumber(), $data->getName(), $data->getMoney());
        }
        // TODO custom exception
        throw new \InvalidArgumentException();
    }

    public function create(EntityAccount $account): void
    {
        // TODO: Implement create() method.
    }

    public function delete(EntityAccount $account): void
    {
        // TODO: Implement delete() method.
    }

    public function transfer(EntityAccount $source, EntityAccount $destination, int $money): void
    {
        $history = $source->transfer($destination, $money);

        // TODO transaction
        $sourceEntity = $this->accountEntityRepository->update($source->getNumber(), $source->getName(), $source->getMoney());
        $destinationEntity = $this->accountEntityRepository->update($destination->getNumber(), $destination->getName(), $destination->getMoney());

        $historyEntity = new \App\Entity\History($sourceEntity, $destinationEntity, $history->getCreatedAt());
        $this->historyEntityRepository->add($historyEntity);
    }

}