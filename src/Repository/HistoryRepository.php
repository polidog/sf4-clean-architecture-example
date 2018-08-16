<?php declare(strict_types=1);

namespace App\Repository;


use App\Entity\Account;
use App\Entity\History;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Polidog\TransferMoneyManagement\Model\Repository\HistoryRepository as Repository;
use Polidog\TransferMoneyManagement\Model\Entity\History as Entity;

class HistoryRepository extends ServiceEntityRepository implements Repository
{
    /**
     * @var AccountRepository
     */
    private $accountRepository;

    public function __construct(ManagerRegistry $registry, AccountRepository $accountRepository)
    {
        $this->accountRepository = $accountRepository;
        parent::__construct($registry, History::class);
    }

    public function add(Entity $history): void
    {
        /** @var Account $source */
        $source = $this->accountRepository->findOneBy(['number' => $history->getSource()->getNumber()]);

        /** @var Account $destination */
        $destination = $this->accountRepository->findOneBy(['number' => $history->getDestination()->getNumber()]);

        $data = new History($source, $destination, $history->getCreatedAt());
        $this->_em->persist($data);
        $this->_em->flush($data);
    }

}