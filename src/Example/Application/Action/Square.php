<?php
declare(strict_types=1);

namespace App\Example\Application\Action;

use App\Example\Application\Action\IO\SquareInput;
use App\Example\Application\Action\IO\SquareOutput;
use App\Example\Application\Service\Calculator;
use App\Shared\Annotation\HttpMetadata;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

final class Square
{
    private Calculator $calculator;

    public function __construct(Calculator $calculator)
    {
        $this->calculator = $calculator;
    }

    /**
     * @ParamConverter(converter="converter.action_input", name="input")
     * @HttpMetadata(statusCode="201")
     */
    public function __invoke(SquareInput $input): SquareOutput
    {
        return new SquareOutput(
            $this->calculator->square($input->testInt())
        );
    }
}
