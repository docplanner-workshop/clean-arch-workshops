<?php
declare(strict_types=1);

namespace App\Docplanner\Application\Action;

use App\Docplanner\Application\Action\IO\BookVisitInput;
use App\Docplanner\Application\Action\IO\BookVisitOutput;
use App\Docplanner\Application\Factory\BookingFactory;
use App\Docplanner\Domain\Repository\Bookings;
use App\Docplanner\Domain\Repository\Doctors;
use App\Docplanner\Domain\Repository\Patients;

final class BookVisit
{
    private Doctors $doctors;
    private Patients $patients;
    private BookingFactory $bookingFactory;
    private Bookings $bookings;

    public function __construct(
        Doctors $doctors,
        Patients $patients,
        Bookings $bookings,
        BookingFactory $bookingFactory
    ) {
        $this->doctors = $doctors;
        $this->patients = $patients;
        $this->bookingFactory = $bookingFactory;
        $this->bookings = $bookings;
    }

    public function __invoke(BookVisitInput $input): BookVisitOutput
    {
        $doctor = $this->doctors->getById($input->getDoctorId());
        $patient = $this->patients->getById($input->getPatientId());

        $booking = $this->bookingFactory->create($doctor, $patient, $input->getStartDate(), $input->getEndDate());

        $this->bookings->save($booking);

        return new BookVisitOutput(
            $booking->id(),
            (int) $booking->visitSpan()->length()->format('i')
        );
    }
}
