<?php
declare(strict_types=1);

namespace App\Shared\Symfony\Response;

use Symfony\Component\DependencyInjection\ServiceLocator;
use Symfony\Component\HttpFoundation\AcceptHeader;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;

final class CallContextResponseFactory implements ResponseFactory
{
    private RequestStack $requestStack;
    private ServiceLocator $factories;
    private ResponseFactory $defaultFactory;

    public function __construct(RequestStack $requestStack, ServiceLocator $factories, ResponseFactory $defaultFactory)
    {
        $this->requestStack = $requestStack;
        $this->factories = $factories;
        $this->defaultFactory = $defaultFactory;
    }

    public function createResponse(object $object): Response
    {
        $acceptHeader = AcceptHeader::fromString($this->requestStack->getCurrentRequest()->headers->get('Accept'))->first();
        return $this->getFactory($acceptHeader === null ? 'application/json' : $acceptHeader->getValue())->createResponse($object);
    }

    private function getFactory(string $acceptHeader): ResponseFactory
    {
        try {
            return $this->factories->get($acceptHeader);
        } catch (\Exception$e) {
            return $this->defaultFactory;
        }
    }

}
