<?php
declare(strict_types=1);

namespace Beeriously\Tests\Unit\Domain\Measurements\Temperature;

use Beeriously\Domain\Measurements\Temperature\AbsoluteZeroException;
use Beeriously\Domain\Measurements\Temperature\DegreesCelsius;
use Beeriously\Domain\Measurements\Temperature\DegreesFahrenheit;
use PHPUnit\Framework\TestCase;

class DegreesCelsiusTest extends TestCase
{
    public function testFromFloat()
    {
        $temp = new DegreesCelsius(0);
        $this->assertSame(0.000, $temp->getValue());

        $temp = new DegreesCelsius(100);
        $this->assertSame(100.000, $temp->getValue());

        $temp = new DegreesCelsius(64.128);
        $this->assertSame(64.128, $temp->getValue());
    }

    public function testPrecision()
    {
        $temp = new DegreesCelsius(30.994500);
        $this->assertSame(30.995, $temp->getValue());
    }

    public function testToString()
    {
        $temp = new DegreesCelsius(30.994500);
        $this->assertSame('30.995 °C', (string)$temp);
    }

    public function testFromFahrenheit()
    {
        $temp = DegreesCelsius::fromFahrenheit(new DegreesFahrenheit(212));
        $this->assertSame('100 °C', (string)$temp);

        $temp = DegreesCelsius::fromFahrenheit(new DegreesFahrenheit(-40));
        $this->assertSame('-40 °C', (string)$temp);

        $temp = DegreesCelsius::fromFahrenheit(new DegreesFahrenheit(0));
        $this->assertSame('-17.778 °C', (string)$temp);
    }
}
