<?php
declare(strict_types=1);

namespace App\Example\Application\Action\IO;

final class SquareOutput
{
    private int $square;

    public function __construct(int $output)
    {
        $this->square = $output;
    }

    public function getSquare(): int
    {
        return $this->square;
    }
}
