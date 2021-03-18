<?php
declare(strict_types=1);

namespace App\Docplanner\Domain\Repository;

use App\Docplanner\Domain\Exception\NotFoundException;
use App\Docplanner\Domain\Model\Patient;

interface Patients
{
    /** @throws NotFoundException */
    public function getById(int $id): Patient;
}
