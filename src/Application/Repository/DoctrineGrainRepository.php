<?php

namespace Beeriously\Application\Repository;

use Beeriously\Domain\Ingredients\Grains\Grain;
use Beeriously\Domain\Ingredients\Grains\GrainRepository;
use Beeriously\Domain\Ingredients\Grains\MinimumDiastaticPowerSpecification;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class DoctrineGrainRepository extends EntityRepository implements GrainRepository
{
    public function __construct(EntityManagerInterface $em)
    {
        /** @var EntityManager $em */
        parent::__construct($em,$em->getClassMetadata(Grain::class));
    }

    /**
     * @param MinimumDiastaticPowerSpecification $specification
     * @return Grain[]
     */
    public function findAutomaticallyConvertingGrain(MinimumDiastaticPowerSpecification $specification): array
    {
        return [];
    }

}