<?php

namespace Beeriously\Tests\Integration\Application\Repository;

use Beeriously\Application\Repository\DoctrineGrainRepository;
use Beeriously\Domain\Ingredients\Grains\Grain;
use Beeriously\Domain\Ingredients\Grains\MinimumDiastaticPowerSpecification;
use Beeriously\Tests\Integration\ContainerAwareTestCase;

class DoctrineGrainRepositoryTest extends ContainerAwareTestCase
{
    public function testAnnotations()
    {
        $repo = $this->getRepo();
        /** @var Grain $grain */
        $grain = $repo->find('c9fe257d-ef6e-47ac-8c5f-ffd328147c78');
        $this->assertEquals("2-Row Malt", (string) $grain->getName());
        $this->assertEquals("1.7 °L", (string) $grain->getLovibond());
        $this->assertEquals("140 °L", (string) $grain->getDegreesLintner());

    }

    public function testGetAutomaticallyConvertingGrain()
    {
        $repo = $this->getRepo();
        $this->assertCount(4,$repo->findAutomaticallyConvertingGrain(new MinimumDiastaticPowerSpecification()));
    }

    private function getRepo(): DoctrineGrainRepository
    {
        return $this->get(DoctrineGrainRepository::class);
    }

}


