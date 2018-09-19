<?php declare(strict_types=1);

namespace App\DataFixtures;


use App\Entity\Account;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class SampleAccountFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $account1 = new Account('taro yamada', 'T_0011123');
        $account2 = new Account('jiro yoshida', 'J_0033567');
        $account1->setBalance(30000);
        $account2->setBalance(30000);

        $manager->persist($account1);
        $manager->persist($account2);
        $manager->flush();
    }

}