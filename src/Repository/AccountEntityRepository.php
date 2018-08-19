<?php declare(strict_types=1);

namespace App\Repository;


use App\Entity\Account;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class AccountEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Account::class);
    }

    public function add(Account $account): void
    {
        $this->_em->persist($account);
        $this->_em->flush($account);
    }

    public function findNumber(string $number, bool $lock) : Account
    {
        $account = $this->findOneBy(['number' => $number]);
        // TODO Lock
        if (!$account instanceof Account ) {
            // TODO Custom Exception
            throw new \InvalidArgumentException(sprintf('number %s is not found', $number));
        }
        return $account;
    }

    public function update(string $number, string $name, int $money) : Account
    {
        $account = $this->findNumber($number, true);
        $account->setName($name);
        $account->setMoney($money);
        $this->_em->flush($account);
        return $account;
    }


}