<?php declare(strict_types=1);

namespace App\Repository;


use App\Entity\Account;
use App\Entity\History as DoctrineHistory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Polidog\TransferMoneyManagement\Model\HistoryRepository;
use Polidog\TransferMoneyManagement\Model\History as DomainHistory;

class HistoryEntityRepository extends ServiceEntityRepository implements HistoryRepository
{
    /**
     * @var AccountEntityRepository
     */
    private $accountRepository;

    public function __construct(ManagerRegistry $registry, AccountEntityRepository $accountRepository)
    {
        $this->accountRepository = $accountRepository;
        parent::__construct($registry, DoctrineHistory::class);
    }

    /**
     * @param DomainHistory $history
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save(DomainHistory $history): void
    {
        /** @var Account $source */
        $source = $this->accountRepository->findOneBy(['number' => (string)$history->getSource()->getNumber()]);
        /** @var Account $destination */
        $destination = $this->accountRepository->findOneBy(['number' => (string)$history->getDestination()->getNumber()]);

        $entity = new DoctrineHistory($source, $destination, $history->getAmount()->getValue(), $history->getCreatedAt());
        $this->_em->persist($entity);
        $this->_em->flush();
    }

}