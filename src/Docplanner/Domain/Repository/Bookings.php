<?php
declare(strict_types=1);

namespace App\Docplanner\Domain\Repository;

use App\Docplanner\Domain\Model\Booking;

interface Bookings
{
    /** @return Booking[] */
    public function findForDoctorId(int $id): array;
}
