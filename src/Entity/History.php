<?php declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Polidog\TransferMoney\DataAccess\AccountDataInterface;
use Polidog\TransferMoney\DataAccess\HistoryDataInterface;

/**
 * @ORM\Entity()
 * @ORM\Table()
 */
class History implements HistoryDataInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(type="bigint")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Account")
     *
     * @var AccountDataInterface
     */
    private $source;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Account")
     *
     * @var AccountDataInterface
     */
    private $destination;

    /**
     * @ORM\Column(type="date_immutable")
     *
     * @var \DateTimeImmutable
     */
    private $createdAt;

    /**
     * History constructor.
     * @param AccountDataInterface $source
     * @param AccountDataInterface $destination
     * @param \DateTimeImmutable $createdAt
     */
    public function __construct(AccountDataInterface $source, AccountDataInterface $destination, \DateTimeImmutable $createdAt)
    {
        $this->source = $source;
        $this->destination = $destination;
        $this->createdAt = $createdAt;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    public function getSource(): AccountDataInterface
    {
        return $this->source;
    }

    public function getDestination(): AccountDataInterface
    {
        return $this->destination;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

}