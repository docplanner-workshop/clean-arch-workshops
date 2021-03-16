<?php
declare(strict_types=1);

namespace App\Shared\Symfony\Response;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

final class JsonResponseFactory implements ResponseFactory
{
    private SerializerInterface $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function createResponse(object $object): Response
    {
        return new JsonResponse(
            $this->serializer->serialize($object, 'json'),
            Response::HTTP_OK,
            [],
            true
        );
    }
}
