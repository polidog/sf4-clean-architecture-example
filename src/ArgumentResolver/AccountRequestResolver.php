<?php declare(strict_types=1);

namespace App\ArgumentResolver;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;

use Polidog\TransferMoneyManagement\UseCase\GetAccount\Request as AccountRequest;

class AccountRequestResolver implements ArgumentValueResolverInterface
{
    public function supports(Request $request, ArgumentMetadata $argument)
    {
        return $argument->getType() === AccountRequest::class && $request->request->get('number') !== null;
    }

    public function resolve(Request $request, ArgumentMetadata $argument)
    {
        yield new AccountRequest($request->request->get('number'));
    }
}