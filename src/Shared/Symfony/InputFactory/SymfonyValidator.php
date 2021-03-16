<?php
declare(strict_types=1);

namespace App\Shared\Symfony\InputFactory;

use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

final class SymfonyValidator implements InputValidator
{
    private ValidatorInterface $validator;

    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    public function validate(object $object): void
    {
        $violations = $this->validator->validate($object);

        if ($violations->count() === 0) {
            return;
        }

        throw new InputValidationException(
            $this->convertToArray($violations)
        );
    }

    private function convertToArray(ConstraintViolationListInterface $violations): array
    {
        $errors = [];
        /** @var ConstraintViolation $violation */

        foreach ($violations as $violation) {
            $errors[$violation->getPropertyPath()][] = $violation->getMessage();
        }

        return $errors;
    }
}
