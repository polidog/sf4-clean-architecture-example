<?php declare(strict_types=1);

namespace App\Controller\Site;


use App\Form\Type\TransferMoneyInputType;
use App\Presenter\TransferMoneyPresenter;
use Polidog\TransferMoneyManagement\UseCase\TransferMoney\TransferMoney;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/transfer-money")
 * @Template()
 */
class TransferMoneyController
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var TransferMoney
     */
    private $useCase;

    /**
     * TransferMoneyController constructor.
     * @param FormFactoryInterface $formFactory
     * @param TransferMoney $useCase
     */
    public function __construct(FormFactoryInterface $formFactory, TransferMoney $useCase)
    {
        $this->formFactory = $formFactory;
        $this->useCase = $useCase;
    }

    /**
     * @Route("/form", methods={"GET"})
     * @Template()
     */
    public function form()
    {
        $form = $this->formFactory->create(TransferMoneyInputType::class);
        return [
            'form' => $form->createView(),
        ];
    }

    /**
     * @Route("/run", methods={"POST"})
     * @Template()
     *
     * @param Request $request
     * @return array
     */
    public function run(Request $request)
    {
        $form = $this->formFactory->create(TransferMoneyInputType::class);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $presenter = new TransferMoneyPresenter();
            $this->useCase->execute($form->getData(), $presenter);
            return [
                'presenter' => $presenter,
            ];
        }

    }
}