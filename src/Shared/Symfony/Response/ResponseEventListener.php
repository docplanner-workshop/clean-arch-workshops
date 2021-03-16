<?php
declare(strict_types=1);

namespace App\Shared\Symfony\Response;

use App\Shared\Annotation\HttpMetadata;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ViewEvent;

final class ResponseEventListener
{
    private ResponseFactory $responseFactory;

    private AnnotationReader $annotationReader;

    public function __construct(
        ResponseFactory $responseFactory,
        AnnotationReader $annotationReader
    ){
        $this->responseFactory = $responseFactory;
        $this->annotationReader = $annotationReader;
    }

    public function __invoke(ViewEvent $responseEvent)
    {
        $result = $responseEvent->getControllerResult();

        if (!is_object($result)) {
            return;
        }

        $response = $this->responseFactory->createResponse($result);

        $this->applyHttpMetadata($response, $responseEvent->getRequest());
        $responseEvent->setResponse($response);
    }

    private function applyHttpMetadata(Response $response, Request $request)
    {
        $params = explode('::', $request->attributes->get('_controller'));

        $method = new \ReflectionMethod($params[0], $params[1] ?? '__invoke');

        /** @var HttpMetadata $annotation */
        $annotation = $this->annotationReader->getMethodAnnotation($method, HttpMetadata::class);

        if ($annotation === null) {
            return;
        }

        $response->setStatusCode($annotation->statusCode);
    }
}
