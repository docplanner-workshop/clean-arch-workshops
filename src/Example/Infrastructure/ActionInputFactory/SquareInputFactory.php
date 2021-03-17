<?php
declare(strict_types=1);

namespace App\Example\Infrastructure\ActionInputFactory;

use App\Example\Application\Action\IO\SquareInput;
use App\Shared\Symfony\InputFactory\InputFactory;
use Symfony\Component\HttpFoundation\Request;

final class SquareInputFactory implements InputFactory
{
    public function convert(Request $request): object
    {
        return new SquareInput(
            (int) $request->get('testInt')
        );
    }

    public static function supports(): string
    {
        return SquareInput::class;
    }
}
