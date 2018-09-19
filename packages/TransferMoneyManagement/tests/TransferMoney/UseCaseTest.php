<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\Tests\TransferMoney;


use PHPUnit\Framework\TestCase;
use Polidog\TransferMoneyManagement\DataAccess\AccountDataAccess;
use Polidog\TransferMoneyManagement\Model\Account;
use Polidog\TransferMoneyManagement\Model\History;
use Polidog\TransferMoneyManagement\UseCase\TransferMoney\Presenter;
use Polidog\TransferMoneyManagement\UseCase\TransferMoney\Request;
use Polidog\TransferMoneyManagement\UseCase\TransferMoney\UseCase;
use Prophecy\Argument;

class UseCaseTest extends TestCase
{
    private $accountDataAccess;

    private $presenter;

    public function setUp(): void
    {
        $this->accountDataAccess = $this->prophesize(AccountDataAccess::class);
        $this->presenter = $this->prophesize(Presenter::class);
    }

    public function test_handle(): void
    {
        $sourceNumber = 'F-001';
        $destinationNumber = 'B-001';
        $money = 1500;

        $source = new Account($sourceNumber, 'taro yamada', 35000);
        $destination = new Account($destinationNumber, 'jiro suzuki', 40000);


        $request = $this->prophesize(Request::class);
        $request->getSourceNumber()
            ->willReturn($sourceNumber);

        $request->getDestinationNumber()
            ->willReturn($destinationNumber);

        $request->getMoney()
            ->willReturn($money);


        $this->accountDataAccess->findAccount($sourceNumber)
            ->willReturn($source)
        ;

        $this->accountDataAccess->findAccount($destinationNumber)
            ->willReturn($destination)
        ;

        $this->accountDataAccess->transferSave($source, $destination, Argument::type(History::class));


        $useCase = new UseCase($this->accountDataAccess->reveal(), $this->presenter->reveal());
        $useCase->handle($request->reveal());

        $this->accountDataAccess->findAccount($sourceNumber)
            ->shouldHaveBeenCalled()
        ;

        $this->accountDataAccess->findAccount($destinationNumber)
            ->shouldHaveBeenCalled()
        ;

        $this->accountDataAccess->transferSave($source, $destination, Argument::type(History::class))
            ->shouldHaveBeenCalled();


    }
}