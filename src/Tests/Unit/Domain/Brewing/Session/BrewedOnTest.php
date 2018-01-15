<?php

namespace Beeriously\Tests\Unit\Domain\Brewing\Session;

use Beeriously\Domain\Brewing\Session\BrewedOn;
use PHPUnit\Framework\TestCase;

class BrewedOnTest extends TestCase
{
    public function testGetter()
    {
        $brewedOn = new BrewedOn(new \DateTime("Mon, 01 Jan 2018 00:00:00 +0000"));
        $this->assertEquals("Mon, 01 Jan 2018 00:00:00 +0000",$brewedOn->getValue()->format('r'));
    }

}


