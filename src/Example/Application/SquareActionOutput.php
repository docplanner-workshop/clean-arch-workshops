<?php
declare(strict_types=1);

namespace App\Example\Application;

final class SquareActionOutput
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
