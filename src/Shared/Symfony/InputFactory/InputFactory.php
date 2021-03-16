<?php
declare(strict_types=1);

namespace App\Shared\Symfony\InputFactory;

use Symfony\Component\HttpFoundation\Request;

interface InputFactory
{
    public function convert(Request $request): object;

    public static function supports(): string;
}
