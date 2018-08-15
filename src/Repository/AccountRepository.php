<?php declare(strict_types=1);

namespace App\Repository;


use App\Entity\Account;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Polidog\TransferMoneyManagement\DataAccess\AccountDataInterface;
use Polidog\TransferMoneyManagement\Gateway\AccountGatewayInterface;

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

    public function create(string $number, string $name, int $money) : AccountDataInterface
    {
        $data = new Account($name, $number, $money);
        $this->_em->persist($data);
        $this->_em->flush($data);
        return $data;
    }


    public function update(AccountDataInterface $data): void
    {
        $this->_em->flush($data);
    }

}