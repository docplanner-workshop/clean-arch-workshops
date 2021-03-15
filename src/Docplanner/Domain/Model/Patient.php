<?php
declare(strict_types=1);

namespace App\Docplanner\Domain\Model;

use App\Shared\Model\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Patient extends Entity
{
    /**
     * @ORM\Embedded(class="App\Docplanner\Domain\Model\PatientName", columnPrefix="patient_")
     */
    private PatientName $patientName;

    public function __construct(PatientName $patientName)
    {
        $this->patientName = $patientName;
    }

    public function patientName(): PatientName
    {
        return $this->patientName;
    }
}
