<?php
declare(strict_types=1);

namespace App\Docplanner\Application\Action\IO;

final class BookVisitOutput
{
    private int $bookingId;
    private int $lengthInMinutes;

    public function __construct(int $bookingId, int $lengthInMinutes)
    {
        $this->bookingId = $bookingId;
        $this->lengthInMinutes = $lengthInMinutes;
    }

    public function getBookingId(): int
    {
        return $this->bookingId;
    }

    public function getLengthInMinutes(): int
    {
        return $this->lengthInMinutes;
    }
}
