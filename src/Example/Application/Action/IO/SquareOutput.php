<?php
declare(strict_types=1);

namespace App\Example\Application\Action\IO;

final class SquareOutput
{
    private int $output;

    public function __construct(int $output)
    {
        $this->output = $output;
    }

    public function getOutput(): int
    {
        return $this->output;
    }
}
