<?php
declare(strict_types=1);

namespace App\Tests\E2E\Docplanner;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class BookVisitTest extends WebTestCase
{
    private KernelBrowser $client;
    /** @var object|\Symfony\Bundle\FrameworkBundle\Routing\Router|null */
    private $router;

    protected function setUp(): void
    {
        $this->client = self::createClient();
        $this->router = self::$kernel->getContainer()->get('router');
    }

    public function test422OnInsufficientData()
    {
        $this->client->request(
            'GET',
            $this->router->generate('book_visit', [
                'doctorId' => 1
            ])
        );

        $this->assertEquals(422, $this->client->getResponse()->getStatusCode());
    }

    public function test201OnGoodData()
    {
        $this->client->request(
            'GET',
            $this->router->generate('book_visit', [
                'doctorId' => 1,
            ]),
            [
                'patientId' => 1,
                'startDate' => '2021-01-01 05:00:00',
                'endDate' => '2021-01-01 05:05:00'
            ]
        );
        dd($this->client->getResponse()->getContent());
        $this->assertEquals(201, $this->client->getResponse()->getStatusCode());
    }
}
