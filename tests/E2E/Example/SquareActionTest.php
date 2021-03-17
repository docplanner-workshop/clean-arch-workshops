<?php
declare(strict_types=1);

namespace App\Tests\E2E\Example;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class SquareActionTest extends WebTestCase
{
    private KernelBrowser $client;
    /** @var object|\Symfony\Bundle\FrameworkBundle\Routing\Router|null */
    private $router;

    protected function setUp(): void
    {
        $this->client = self::createClient();
        $this->router = self::$kernel->getContainer()->get('router');
    }

    public function testTestActionReturnsSquareOfInput()
    {
        $this->client->request(
            'GET',
            $this->router->generate('example', [
                'testInt' => 10
            ])
        );

        $this->assertEquals(201, $this->client->getResponse()->getStatusCode());

        $this->assertEquals(
            100,
            json_decode($this->client->getResponse()->getContent(), true)['square']
        );
    }
}
