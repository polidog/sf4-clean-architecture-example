<?php declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Polidog\TransferMoneyManagement\DataAccess\AccountDataInterface;

/**
 * @ORM\Entity()
 * @ORM\Table()
 */
class Account implements AccountDataInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", unique=true)
     */
    private $number;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    private $money;

    /**
     * Account constructor.
     * @param string $name
     * @param string $number
     * @param int $money
     */
    public function __construct(string $name, string $number, int $money)
    {
        $this->name = $name;
        $this->number = $number;
        $this->money = $money;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getMoney()
    {
        return $this->money;
    }

    public function deposit(int $money): void
    {
        $this->money += $money;
    }

    public function withdraw(int $money): void
    {
        $this->money -= $money;
        // TODO: Check money
    }


}