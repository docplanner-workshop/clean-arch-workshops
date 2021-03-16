<?php
declare(strict_types=1);

namespace App\Example\Application;

use App\Shared\Annotation\HttpMetadata;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

final class SquareAction
{
    /**
     * @ParamConverter(converter="converter.action_input", name="input")
     * @HttpMetadata(statusCode="201")
     */
    public function __invoke(SquareActionInput $input): SquareActionOutput
    {
        return new SquareActionOutput(
            $input->testInt() * $input->testInt()
        );
    }
}
