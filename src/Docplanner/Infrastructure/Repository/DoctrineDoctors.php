<?php
declare(strict_types=1);

namespace App\Docplanner\Infrastructure\Repository;

use App\Docplanner\Domain\Model\Doctor;
use App\Docplanner\Domain\Repository\Doctors;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;

final class DoctrineDoctors implements Doctors
{
    private EntityManagerInterface $entityManager;
    /** @var ObjectRepository<Doctor> */
    private ObjectRepository $repository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repository = $entityManager->getRepository(Doctor::class);
    }

    public function getById(int $id): Doctor
    {
        return $this->repository->find($id);
    }

    public function save(Doctor $doctor): void
    {
        $this->entityManager->persist($doctor);
        $this->entityManager->flush();
    }

}
