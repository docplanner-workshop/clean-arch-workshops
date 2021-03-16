<?php
declare(strict_types=1);

namespace App\Shared\Symfony\Listener;

use App\Shared\Symfony\InputFactory\InputValidationException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

final class InputValidationExceptionListener
{
    public function __invoke(ExceptionEvent $exceptionEvent)
    {
        /** @var InputValidationException $exception */
        $exception = $exceptionEvent->getThrowable();

        if (!$this->supports($exception)) {
            return;
        }

        $exceptionEvent->setResponse(
            new JsonResponse(
                $exception->getErrors(),
                JsonResponse::HTTP_UNPROCESSABLE_ENTITY
            )
        );
    }

    private function supports(\Throwable $exception): bool
    {
        return $exception instanceof InputValidationException;
    }
}
