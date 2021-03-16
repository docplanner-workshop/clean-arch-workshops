<?php
declare(strict_types=1);

namespace App\Shared\Symfony\InputFactory;

interface InputValidator
{
    public function validate(object $object): void;
}
