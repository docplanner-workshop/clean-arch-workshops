<?php
declare(strict_types=1);

namespace App\Shared\Symfony\InputFactory;


final class InputValidationException extends \RuntimeException
{
    private array $errors;

    public function __construct(array $errors)
    {
        $this->errors = $errors;
        parent::__construct();
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}
