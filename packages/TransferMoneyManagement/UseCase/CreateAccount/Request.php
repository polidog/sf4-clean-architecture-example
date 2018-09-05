<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\UseCase\CreateAccount;


class Request
{
    /**
     * @var string
     */
    private $name;

    /**
     * Request constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function name()
    {
        return $this->name;
    }
}