<?php
declare(strict_types=1);

namespace App\Docplanner\Infrastructure\Repository;

use App\Docplanner\Domain\Model\Patient;
use App\Docplanner\Domain\Repository\Patients;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;

final class DoctrinePatients implements Patients
{
    private EntityManagerInterface $entityManager;
    /** @var ObjectRepository<Patient> */
    private ObjectRepository $repository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repository = $entityManager->getRepository(Patient::class);
    }

    public function getById(int $id): Patient
    {
        return $this->repository->find($id);
    }
}
