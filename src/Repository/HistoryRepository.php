<?php declare(strict_types=1);

namespace App\Repository;


use App\Entity\History;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Polidog\TransferMoney\DataAccess\AccountDataInterface;
use Polidog\TransferMoney\DataAccess\HistoryDataInterface;
use Polidog\TransferMoney\Gateway\HistoryGatewayInterface;

class HistoryRepository extends ServiceEntityRepository implements HistoryGatewayInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, History::class);
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function create(AccountDataInterface $source, AccountDataInterface $destination, \DateTimeImmutable $createdAt): HistoryDataInterface
    {
        $data = new History($source, $destination, $createdAt);
        $this->_em->persist($data);
        $this->_em->flush($data);

        return $data;
    }

}