<?php
declare(strict_types=1);

namespace App\Docplanner\Application\Factory;

use App\Docplanner\Domain\Model\Booking;
use App\Docplanner\Domain\Model\Doctor;
use App\Docplanner\Domain\Model\Patient;
use App\Docplanner\Domain\Model\VisitSpan;

final class BookingFactory
{
    public function create(Doctor $doctor, Patient $patient, \DateTimeImmutable $startDate, \DateTimeImmutable $endDate): Booking
    {
        return new Booking(
            $doctor,
            new VisitSpan(
                $startDate,
                $endDate
            ),
            $patient
        );
    }
}
