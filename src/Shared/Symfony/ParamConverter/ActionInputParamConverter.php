<?php
declare(strict_types=1);

namespace App\Shared\Symfony\ParamConverter;

use App\Shared\Symfony\InputFactory\InputFactory;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;

final class ActionInputParamConverter implements ParamConverterInterface
{
    private InputFactoryServiceLocator $serviceLocator;
    private InputFactory $factory;

    public function __construct(InputFactoryServiceLocator $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
    }

    public function apply(Request $request, ParamConverter $configuration)
    {
        $input = $this->factory->convert($request);
        $request->attributes->set(
            $configuration->getName(),
            $input
        );
    }

    public function supports(ParamConverter $configuration): bool
    {
        $this->factory = $this->serviceLocator->getInputFactory($configuration->getClass());

        return $this->factory::supports() === $configuration->getClass();
    }

    private function validate(object $input): void
    {

    }

}
