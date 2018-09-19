<?php declare(strict_types=1);

namespace App\Repository;


use App\Entity\Account as DoctrineAccount;
use App\Entity\Account;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Polidog\TransferMoneyManagement\Model\AccountNumber;
use Polidog\TransferMoneyManagement\Model\AccountRepository;

use Polidog\TransferMoneyManagement\Model\Account as DomainAccount;
use Polidog\TransferMoneyManagement\Model\Money;


class AccountEntityRepository extends ServiceEntityRepository implements AccountRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DoctrineAccount::class);
    }

    /**
     * @param AccountNumber $number
     * @return DomainAccount
     * @throws \Exception
     */
    public function findAccount(AccountNumber $number): DomainAccount
    {
        /** @var DoctrineAccount $entity */
        $entity = $this->findOneBy(['number' => (string)$number]);
        if (!$entity instanceof DoctrineAccount) {
            throw new \Exception('アカウントが見つかりません...');
        }
        return new DomainAccount(new AccountNumber($entity->getNumber()), new Money($entity->getBalance()), $entity->getName());
    }

    /**
     * @param DomainAccount $account
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save(DomainAccount $account): void
    {
        $entity = $this->findOneBy(['number' => (string)$account->getNumber()]);
        if (false === $entity instanceof DoctrineAccount) {
            $entity = new DoctrineAccount($account->getName(), (string)$account->getNumber());
            $this->_em->persist($entity);
        }
        $entity->setBalance($account->getBalance()->getValue());
        $this->_em->flush($entity);
    }

}