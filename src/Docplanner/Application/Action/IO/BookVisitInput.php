<?php
declare(strict_types=1);

namespace App\Docplanner\Application\Action\IO;

use DateTimeImmutable;
use Symfony\Component\Validator\Constraints as Assert;

final class BookVisitInput
{
    /**
     * @Assert\Greater(0)
     */
    private int $doctorId;

    /**
     * @Assert\GreaterThan(0)
     */
    private int $patientId;

    /**
     * @Assert\NotNull()
     */
    private ?DateTimeImmutable $startDate;

    /**
     * @Assert\NotNull()
     */
    private ?DateTimeImmutable $endDate;

    public function __construct(
        int $doctorId,
        int $patientId,
        ?DateTimeImmutable $startDate,
        ?DateTimeImmutable $endDate
    ) {
        $this->doctorId = $doctorId;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->patientId = $patientId;
    }

    public function getDoctorId(): int
    {
        return $this->doctorId;
    }

    public function getPatientId(): int
    {
        return $this->patientId;
    }

    public function getStartDate(): DateTimeImmutable
    {
        return $this->startDate;
    }

    public function getEndDate(): ?DateTimeImmutable
    {
        return $this->endDate;
    }
}
