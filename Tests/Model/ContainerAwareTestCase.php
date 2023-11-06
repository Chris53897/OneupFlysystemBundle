<?php

namespace Oneup\FlysystemBundle\Tests\Model;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ContainerAwareTestCase extends WebTestCase
{
    protected KernelBrowser $client;
    protected static ContainerInterface $container;

    public function setUp(): void
    {
        $this->client = static::createClient();
        self::$container = $this->client->getContainer();
    }

    public function tearDown(): void
    {
        parent::tearDown();

        unset($this->client);
    }
}
