<?php

namespace App\Bundle\MainBundle\Tests\Controller;

use Liip\FunctionalTestBundle\Test\WebTestCase;

class AccountControllerTest extends WebTestCase
{
    public function testGet()
    {
        $this->loadFixtures([
            'App\Bundle\MainBundle\DataFixtures\ORM\LoadAccountData',
        ]);

        $client = static::createClient();

        // Request a valid account
        $client->request('GET', '/account/1', array('ACCEPT' => 'application/json'));
        $response = $client->getResponse();
        $content = $response->getContent();

        $this->assertJsonResponse($response, 200);
        $this->assertEquals('{"identifier":1,"username":"existing_user","credentials":"toto42","domain":"default"}', $content);

        // Request a non existing account
        $client->request('GET', '/account/2', array('ACCEPT' => 'application/json'));
        $response = $client->getResponse();

        $this->assertJsonResponse($response, 404);
    }

    private function assertJsonResponse($response, $statusCode)
    {
        $this->assertEquals(
            $statusCode,
            $response->getStatusCode(),
            $response->getContent()
        );
        $this->assertTrue(
            $response->headers->contains('Content-Type', 'application/json'),
            $response->headers
        );
    }
}
