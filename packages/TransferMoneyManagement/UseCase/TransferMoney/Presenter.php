<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\UseCase\TransferMoney;

/**
 * Output Boundary
 */
interface Presenter
{
    public function setOutputData(Response $response);
}