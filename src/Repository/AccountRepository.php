<?php declare(strict_types=1);

namespace App\Repository;


use App\Entity\Account;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Polidog\TransferMoneyManagement\Model\EntityFactory\AccountFactory;
use Polidog\TransferMoneyManagement\Model\Repository\AccountRepository as Repository;
use Polidog\TransferMoneyManagement\Model\Entity\Account as Entity;

class AccountRepository extends ServiceEntityRepository implements Repository
{
    /**
     * @var AccountFactory
     */
    private $accountFactory;

    public function __construct(ManagerRegistry $registry, AccountFactory $accountFactory)
    {
        $this->accountFactory = $accountFactory;
        parent::__construct($registry, Account::class);
    }

    public function findAccount(string $number): Entity
    {
        $data = $this->findOneBy(['number' => $number]);
        if ($data instanceof Account) {
            return $this->accountFactory->fromData($data->getNumber(), $data->getName(), $data->getMoney());
        }
        // TODO custom exception
        throw new \InvalidArgumentException();
    }

    public function create(Entity $account): void
    {
        $data = new Account($account->getName(), $account->getNumber());
        $data->setMoney($account->getMoney());
        $this->_em->persist($data);
        $this->_em->flush($data);
    }

    public function update(Entity $account): void
    {
        /** @var Account $data */
        $data = $this->findOneBy(['number' => $account->getNumber()]);
        if (false === $data instanceof Account) {
            // TODO custom exception
            throw new \InvalidArgumentException();
        }

        $data->setMoney($account->getMoney());
        $data->setName($account->getName());

        $this->_em->persist($data);
        $this->_em->flush($data);
    }

    public function delete(Entity $account): void
    {
        // TODO: Implement delete() method.
    }


}