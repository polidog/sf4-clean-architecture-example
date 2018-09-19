<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\Model;


/**
 * ValueObject
 */
class AccountNumber
{
    /**
     * @var string
     */
    private $number;

    /**
     * AccountNumber constructor.
     * @param string $number
     */
    public function __construct(string $number)
    {
        $this->number = $number;
    }

    public function __toString()
    {
        return $this->number;
    }


    public static function create()
    {
        return new self(uniqid('ac_', true));
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

}