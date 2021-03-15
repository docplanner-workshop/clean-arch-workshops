<?php
declare(strict_types=1);

namespace App\Docplanner\Domain\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable()
 */
class VisitSpan
{
    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private \DateTimeImmutable $start;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private \DateTimeImmutable $end;

    public function __construct(\DateTimeImmutable $start, \DateTimeImmutable $end)
    {
        if ($end < $start) {
            throw new \LogicException('End date cannot be before start date');
        }

        $this->start = $start;
        $this->end = $end;
    }

    public function start(): \DateTimeImmutable
    {
        return $this->start;
    }

    public function end(): \DateTimeImmutable
    {
        return $this->end;
    }

    public function length(): \DateInterval
    {
        return $this->start->diff($this->end);
    }
}
