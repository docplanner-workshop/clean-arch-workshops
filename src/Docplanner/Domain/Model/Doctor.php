<?php
declare(strict_types=1);

namespace App\Docplanner\Domain\Model;

use App\Shared\Model\Entity;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Doctor extends Entity
{
    /**
     * @ORM\Embedded(class="App\Docplanner\Domain\Model\DoctorName", columnPrefix="doctor_")
     */
    private DoctorName $doctorName;

    /**
     * @ORM\OneToMany(targetEntity="App\Docplanner\Domain\Model\Booking", mappedBy="doctor")
     */
    private Collection $bookings;

    public function __construct(DoctorName $doctorName)
    {
        $this->doctorName = $doctorName;
    }

    /**
     * @return Booking[]
     */
    public function bookings(): array
    {
        return $this->bookings->toArray();
    }

    public function hasFreeSpace(VisitSpan $visitSpan): bool
    {
        return true; //@TODO: Implement Logic
    }
}
