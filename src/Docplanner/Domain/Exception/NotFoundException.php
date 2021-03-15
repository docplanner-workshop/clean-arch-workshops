<?php
declare(strict_types=1);

namespace App\Docplanner\Domain\Exception;

final class NotFoundException extends \DomainException
{
    public function __construct(string $entity, int $id)
    {
        parent::__construct(sprintf('Entity %s of ID %s could not be found', $entity, $id));
    }
}
