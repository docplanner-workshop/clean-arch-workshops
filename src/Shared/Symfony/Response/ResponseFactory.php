<?php
declare(strict_types=1);

namespace App\Shared\Symfony\Response;

use Symfony\Component\HttpFoundation\Response;

interface ResponseFactory
{
    public function createResponse(object $object): Response;
}
