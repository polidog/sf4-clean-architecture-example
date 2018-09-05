<?php declare(strict_types=1);

namespace App\Presenter;


use Polidog\TransferMoneyManagement\UseCase\GetAccount\Presenter;
use Polidog\TransferMoneyManagement\UseCase\GetAccount\Response;

class GetAccountPresenter implements Presenter
{
    /**
     * @var \Twig_Environment
     */
    private $view;

    /**
     * GetAccountPresenter constructor.
     * @param \Twig_Environment $view
     */
    public function __construct(\Twig_Environment $view)
    {
        $this->view = $view;
    }

    public function setAccount(Response $response): void
    {
        $this->view->addGlobal('account', [
            'number' => $response->getNumber(),
            'name' => $response->getName(),
            'money' => $response->getMoney(),
        ]);
    }

}