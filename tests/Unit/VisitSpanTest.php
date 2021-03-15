<?php
declare(strict_types=1);

namespace App\Tests\Unit;

use App\Docplanner\Domain\Model\VisitSpan;
use PHPUnit\Framework\TestCase;

final class VisitSpanTest extends TestCase
{
    public function testYouCannotCreateVisitSpanWithEndBeforeStart(): void
    {
        $this->expectException(\LogicException::class);

        new VisitSpan(new \DateTimeImmutable('2020-01-02 01:01:01'), new \DateTimeImmutable('2020-01-02 01:01:00'));
    }

    public function testYouCanCreateVisitSpanWhenDatesAreEqual(): void
    {
        $start = new \DateTimeImmutable('2020-01-02 01:01:01');
        $end = new \DateTimeImmutable('2020-01-02 01:01:01');

        $visitSpan = new VisitSpan($start, $end);

        $this->assertSame($start, $visitSpan->start());
        $this->assertSame($end, $visitSpan->end());
    }

    public function testYouCanCreateVisitSpanWhenEndIsAfterStart(): void
    {
        $start = new \DateTimeImmutable('2020-01-02 01:01:01');
        $end = new \DateTimeImmutable('2020-01-02 01:01:02');

        $visitSpan = new VisitSpan($start, $end);

        $this->assertSame($start, $visitSpan->start());
        $this->assertSame($end, $visitSpan->end());
    }
}
