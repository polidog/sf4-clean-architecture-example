<?php declare(strict_types=1);

namespace Polidog\TransferMoneyManagement\UseCase\TransferMoney;


use Polidog\TransferMoneyManagement\DataAccess\AccountDataAccess;

/**
 * UseCase Interactor
 */
class UseCase implements TransferMoney
{
    /**
     * @var AccountDataAccess
     */
    private $accountDataAccess;

    /**
     * @var Presenter
     */
    private $presenter;

    /**
     * UseCase constructor.
     * @param AccountDataAccess $accountDataAccess
     * @param Presenter $presenter
     */
    public function __construct(AccountDataAccess $accountDataAccess, Presenter $presenter)
    {
        $this->accountDataAccess = $accountDataAccess;
        $this->presenter = $presenter;
    }

    /**
     * @throws \Exception
     */
    public function handle(Request $request): void
    {
        $source = $this->accountDataAccess->findAccount($request->getSourceNumber());
        $destination = $this->accountDataAccess->findAccount($request->getDestinationNumber());
        $history = $source->transfer($destination, $request->getMoney());
        $this->accountDataAccess->transferSave($source, $destination, $history);

        $this->presenter->setOutputData(new Response($source, $destination, $request->getMoney()));
    }

}