<?php
declare(strict_types=1);

namespace App\Docplanner\Infrastructure\Repository;

use App\Docplanner\Domain\Model\Booking;
use App\Docplanner\Domain\Model\Doctor;
use App\Docplanner\Domain\Repository\Bookings;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;

final class DoctrineBookings implements Bookings
{
    private EntityManagerInterface $entityManager;
    /** @var ObjectRepository<Booking> */
    private ObjectRepository $repository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repository = $entityManager->getRepository(Booking::class);
    }

    public function findForDoctorId(int $id): array
    {
        return $this->repository->findBy(
            ['doctor' => $this->entityManager->getReference(Doctor::class, $id)]
        );
    }

    public function save(Booking $booking): void
    {
        $this->entityManager->persist($booking);
        $this->entityManager->flush();
    }
}
