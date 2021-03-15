<?php
declare(strict_types=1);

namespace App\Docplanner\Domain\Repository;

use App\Docplanner\Domain\Exception\NotFoundException;
use App\Docplanner\Domain\Model\Doctor;

interface Doctors
{
    /** @throws NotFoundException */
    public function getById(int $id): Doctor;
}
