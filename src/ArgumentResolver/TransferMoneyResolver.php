<?php declare(strict_types=1);

namespace App\ArgumentResolver;


use Polidog\TransferMoney\UseCase\Data\TransferMoneyInput;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;

class TransferMoneyResolver implements ArgumentValueResolverInterface
{
    public function supports(Request $request, ArgumentMetadata $argument)
    {
        return $argument->getType() === TransferMoneyInput::class && $request->request->get('source') !== null && $request->request->get('destination') !== null && $request->request->get('money');
    }

    public function resolve(Request $request, ArgumentMetadata $argument)
    {
        yield new TransferMoneyInput($request->request->get('source'), $request->request->get('destination'), $request->request->getInt('money'));
    }
}