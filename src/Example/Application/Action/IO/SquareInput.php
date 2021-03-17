<?php
declare(strict_types=1);

namespace App\Example\Application\Action\IO;

use Symfony\Component\Validator\Constraints as Assert;

final class SquareInput
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
