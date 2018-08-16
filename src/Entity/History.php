<?php declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table()
 */
class History
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
     * @var Account
     */
    private $source;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Account")
     *
     * @var Account
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
     * @param Account $source
     * @param Account $destination
     * @param \DateTimeImmutable $createdAt
     */
    public function __construct(Account $source, Account $destination, \DateTimeImmutable $createdAt)
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

    public function getSource(): Account
    {
        return $this->source;
    }

    public function getDestination(): Account
    {
        return $this->destination;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

}