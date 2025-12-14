<?php

namespace App\Tests\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class ProductControllerTest extends WebTestCase
{
    static public function baseUrl($endpoint)
    {
        return 'http://localhost:8001'.$endpoint;
    }
    public function testIndex(): void
    {
        $client = static::createClient();
        $client->request('GET', self::baseUrl(' /api/products')  );

        self::assertResponseIsSuccessful();
    }

}
