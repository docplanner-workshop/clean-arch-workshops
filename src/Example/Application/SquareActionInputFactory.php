<?php
declare(strict_types=1);

namespace App\Example\Application;

use App\Shared\Symfony\InputFactory\InputFactory;
use Symfony\Component\HttpFoundation\Request;

final class SquareActionInputFactory implements InputFactory
{
    public function convert(Request $request): object
    {
        return new SquareActionInput(
            (int) $request->get('testInt')
        );
    }

    public static function supports(): string
    {
        return SquareActionInput::class;
    }
}
