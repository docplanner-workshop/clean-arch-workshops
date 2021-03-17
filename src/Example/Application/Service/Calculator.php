<?php
declare(strict_types=1);

namespace App\Example\Application\Service;

final class Calculator
{
    public function square(int $toSquare): int
    {
        return $toSquare * $toSquare;
    }
}
