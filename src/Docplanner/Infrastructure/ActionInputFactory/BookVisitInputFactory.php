<?php
declare(strict_types=1);

namespace App\Docplanner\Infrastructure\ActionInputFactory;

use App\Docplanner\Application\Action\IO\BookVisitInput;
use App\Shared\Symfony\InputFactory\InputFactory;
use DateTimeImmutable;
use Exception;
use Symfony\Component\HttpFoundation\Request;
use TypeError;

final class BookVisitInputFactory implements InputFactory
{
    private const DOCTOR_ID = 'doctorId';
    private const PATIENT_ID = 'patientId';
    private const START_DATE = 'startDate';
    private const END_DATE = 'endDate';

    public function convert(Request $request): object
    {
        try {
            $startDate = new DateTimeImmutable($request->get(self::START_DATE));
            $endDate = new DateTimeImmutable($request->get(self::END_DATE));
        } catch (Exception | TypeError $e) {
            $startDate = null;
            $endDate = null;
        }

        return new BookVisitInput(
            (int) $request->get(self::DOCTOR_ID),
            (int) $request->get(self::PATIENT_ID),
            $startDate,
            $endDate
        );
    }

    public static function supports(): string
    {
        return BookVisitInput::class;
    }
}
