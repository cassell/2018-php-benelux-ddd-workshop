<?php
declare(strict_types=1);

namespace Beeriously\Domain\Measurements\Temperature;

class DegreesCelsius implements Temperature
{
    use TemperatureStringFormat;

    private const SYMBOL = '°C';

    public function __construct(float $value)
    {

    }

    public static function getSymbol(): string
    {
        return self::SYMBOL;
    }

    public static function fromFahrenheit(DegreesFahrenheit $fahrenheit): self
    {

    }

    public function getValue(): float
    {

    }

    public static function fromFahrenheit(DegreesFahrenheit $fahrenheit): self
    {

    }

}
