<?php

class HomepageTest extends \Application\WebTestCase
{
    public function testHomepageContainsForm()
    {
        $client = $this->createClient();
        $client->followRedirects(true);
        $crawler = $client->request('GET', '/');

        $this->assertTrue($client->getResponse()->isOk());
        $this->assertCount(1, $crawler->filter('form'));

    }
}
