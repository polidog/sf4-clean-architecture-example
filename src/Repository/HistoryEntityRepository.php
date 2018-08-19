<?php declare(strict_types=1);

namespace App\Repository;


use App\Entity\History;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class HistoryEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, History::class);
    }

    public function add(History $history): void
    {
        $this->_em->persist($history);
        $this->_em->flush($history);
    }
}