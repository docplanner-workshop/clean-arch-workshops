<?php
declare(strict_types=1);

namespace App\Shared\Symfony\Response;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

final class XmlResponseFactory implements ContentTypeResponseFactory
{
    /** @var SerializerInterface */
    private SerializerInterface $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function createResponse(object $object): Response
    {
        return new Response(
            $this->serializer->serialize($object, 'xml'),
            Response::HTTP_OK,
            [
                'Content-Type' => 'application/xml'
            ]
        );
    }

    public static function contentType(): string
    {
        return 'application/xml';
    }
}
