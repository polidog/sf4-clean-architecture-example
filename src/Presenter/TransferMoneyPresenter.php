<?php declare(strict_types=1);

namespace App\Presenter;


use Polidog\TransferMoneyManagement\UseCase\TransferMoney\Presenter;
use Polidog\TransferMoneyManagement\UseCase\TransferMoney\Response;

class TransferMoneyPresenter implements Presenter
{
    /**
     * @var \Twig_Environment
     */
    private $view;

    /**
     * TransferMoneyPresenter constructor.
     * @param \Twig_Environment $view
     */
    public function __construct(\Twig_Environment $view)
    {
        $this->view = $view;
    }

    public function setOutputData(Response $response): void
    {
        $this->view->addGlobal('money', $response->getMoney());
        $this->view->addGlobal('destination', $response->getDestination());
        $this->view->addGlobal('source', $response->getSource());
    }

}