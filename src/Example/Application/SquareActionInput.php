<?php
declare(strict_types=1);

namespace App\Example\Application;

use Symfony\Component\Validator\Constraints as Assert;

final class SquareActionInput
{
    /**
     * @Assert\GreaterThan(value="0")
     */
    private int $testInt;

    public function __construct(int $testInt)
    {
        $this->testInt = $testInt;
    }

    public function testInt(): int
    {
        return $this->testInt;
    }
}
