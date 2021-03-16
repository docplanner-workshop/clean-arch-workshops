<?php
declare(strict_types=1);

namespace App\Shared\Symfony\ParamConverter;

use App\Shared\Symfony\InputFactory\InputFactory;
use Symfony\Component\DependencyInjection\ServiceLocator;

final class InputFactoryServiceLocator
{
    private ServiceLocator $serviceLocator;

    public function __construct(ServiceLocator $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
    }

    public function getInputFactory(string $class): InputFactory
    {
        return $this->serviceLocator->get($class);
    }
}
