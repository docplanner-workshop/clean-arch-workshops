<?php
declare(strict_types=1);

namespace App\Example\Application;

use App\Shared\Annotation\HttpMetadata;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

final class TestAction
{
    /**
     * @ParamConverter(converter="converter.action_input", name="input")
     * @HttpMetadata(statusCode="201")
     */
    public function __invoke(TestActionInput $input): TestActionOutput
    {
        return new TestActionOutput(
            $input->testInt() * $input->testInt()
        );
    }
}
