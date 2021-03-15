<?php
declare(strict_types=1);

namespace App\Docplanner\Domain\Model;

use App\Shared\Model\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Booking extends Entity
{
    /**
     * @ORM\ManyToOne(targetEntity="App\Docplanner\Domain\Model\Doctor", inversedBy="bookings")
     * @ORM\JoinColumn(name="doctor_id", nullable=false)
     */
    private Doctor $doctor;

    /**
     * @ORM\Embedded(class="App\Docplanner\Domain\Model\VisitSpan", columnPrefix="visit_")
     */
    private VisitSpan $visitSpan;

    /**
     * @ORM\ManyToOne(targetEntity="App\Docplanner\Domain\Model\Patient")
     * @ORM\JoinColumn(name="patient_id", nullable=false)
     */
    private Patient $patient;

    public function __construct(Doctor $doctor, VisitSpan $visitSpan, Patient $patient)
    {
        if (!$doctor->hasFreeSpace($visitSpan)) {
            throw new \DomainException(sprintf('Doctor of id %s has no free space for visit', $doctor->id()));
        }

        $this->doctor = $doctor;
        $this->visitSpan = $visitSpan;
        $this->patient = $patient;
    }

    public function doctor(): Doctor
    {
        return $this->doctor;
    }

    public function visitSpan(): VisitSpan
    {
        return $this->visitSpan;
    }
}
