<?php declare(strict_types=1);

namespace App\Repository;


use App\Entity\Account;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Polidog\TransferMoney\Data\AccountDataInterface;
use Polidog\TransferMoney\Gateway\AccountGatewayInterface;

class AccountRepository extends ServiceEntityRepository implements AccountGatewayInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Account::class);
    }

    public function findAccount(string $number): AccountDataInterface
    {
        return $this->findOneBy(['number' => $number]);
    }

    public function create(AccountDataInterface $data): void
    {
        $this->_em->persist($data);
        $this->_em->flush($data);
    }


    public function save(AccountDataInterface $data): void
    {
        $this->_em->flush($data);
    }

}