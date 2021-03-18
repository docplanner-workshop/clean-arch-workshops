<?php
declare(strict_types=1);

namespace App\Shared\Symfony\Response;

interface ContentTypeResponseFactory extends ResponseFactory
{
    public static function contentType(): string;
}
