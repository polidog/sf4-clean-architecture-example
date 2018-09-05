<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\UseCase\GetAccount;


class Request
{
    /**
     * @var string
     */
    private $number;

    /**
     * Request constructor.
     * @param int $number
     */
    public function __construct(string $number)
    {
        $this->number = $number;
    }

    public function number() : string
    {
        return $this->number;
    }

}