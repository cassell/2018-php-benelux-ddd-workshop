<?php

namespace Beeriously\Tests\Integration;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ContainerAwareTestCase extends KernelTestCase
{

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $em;

    /**
     * {@inheritDoc}
     */
    protected function setUp()
    {
        self::bootKernel();
        $this->em = $this->getEntityManager();
        parent::setUp();
    }


    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();
        $this->em->close();
        $this->em = null; // avoid memory leaks
    }

    protected function get($class)
    {
        return static::$kernel->getContainer()->get($class);
    }

    private function getEntityManager()
    {
        return static::$kernel->getContainer()->get('doctrine')->getManager();
    }
}