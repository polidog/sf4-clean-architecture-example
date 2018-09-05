<?php declare(strict_types=1);

namespace App\Controller\Site;


use Polidog\TransferMoneyManagement\UseCase\GetAccount\GetAccount;
use Polidog\TransferMoneyManagement\UseCase\GetAccount\Request;
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

    public function __invoke(Request $request) : array
    {
        $this->useCase->handle($request);
        return [];
    }
}