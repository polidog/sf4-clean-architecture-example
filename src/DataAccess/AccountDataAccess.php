<?php declare(strict_types=1);

namespace App\DataAccess;


use App\Repository\AccountEntityRepository;
use App\Repository\HistoryEntityRepository;
use App\Entity\Account;
use Polidog\TransferMoneyManagement\Model\AccountFactory;
use Polidog\TransferMoneyManagement\DataAccess\AccountDataAccess as IAccountDataAccess;
use Polidog\TransferMoneyManagement\Model\Account as EntityAccount;
use Polidog\TransferMoneyManagement\Model\History;

class AccountDataAccess implements IAccountDataAccess
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
        $entity = new Account($account->getName(), $account->getNumber());
        $entity->setMoney($account->getMoney());

        $this->accountEntityRepository->add($entity);
    }

    public function delete(EntityAccount $account): void
    {
        // TODO: Implement delete() method.
    }

    public function transferSave(EntityAccount $source, EntityAccount $destination, History $history): void
    {
        // TODO transaction
        $sourceEntity = $this->accountEntityRepository->update($source->getNumber(), $source->getName(), $source->getMoney());
        $destinationEntity = $this->accountEntityRepository->update($destination->getNumber(), $destination->getName(), $destination->getMoney());

        $historyEntity = new \App\Entity\History($sourceEntity, $destinationEntity, $history->getCreatedAt());
        $this->historyEntityRepository->add($historyEntity);
    }

}