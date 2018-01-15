<?php

namespace Beeriously\Domain\Ingredients\Grains;

class MinimumDiastaticPowerSpecification
{
    // https://en.wikipedia.org/wiki/Degree_Lintner
    // Evaluation of a malt or extract is usually done by the manufacturer rather than by the end user; as a rule of thumb,
    // the total grain bill of a mash should have a diastatic power of at least 40 °L in order to guarantee efficient
    // conversion of all the starches in the mash to sugars.
    const MINIMUM_DIASTATIC_POWER_TO_CONVERT = 40;


}