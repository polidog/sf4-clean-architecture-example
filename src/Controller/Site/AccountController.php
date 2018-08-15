<?php

namespace App\Controller\Site;


use App\Presenter\GetAccountPresenter;
use Polidog\TransferMoneyManagement\UseCase\GetAccount\GetAccount;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/accounts/{number}", methods={"GET"}, name="app_account")
 * @Template()
 */
class AccountController
{
    /**
     * @var GetAccount
     */
    private $useCase;

    /**
     * AccountController constructor.
     * @param GetAccount $useCase
     */
    public function __construct(GetAccount $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(string $number) : array
    {
        $presenter = new GetAccountPresenter();
        $this->useCase->execute($number, $presenter);

        return [
            'presenter' => $presenter,
        ];
    }
}