<?php

namespace Beeriously\Domain\Ingredients\Grains;

interface GrainRepository
{
    /**
     * @param MinimumDiastaticPowerSpecification $specification
     * @return Grain[]
     */
    public function findAutomaticallyConvertingGrain(MinimumDiastaticPowerSpecification $specification): array;

}