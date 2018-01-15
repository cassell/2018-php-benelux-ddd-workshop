<?php

namespace Beeriously\Domain\Ingredients\Grains;

class Lovibond
{
    private const SYMBOL = "°L";

    /**
     * @var float
     */
    private $value;

    private function __construct(float $value)
    {
        $this->value = $value;
    }

    public static function fromFloat(float $lovibond)
    {
        return new self($lovibond);
    }

    public function __toString()
    {
        return round($this->value,1) . " " . self::SYMBOL;
    }

    public function getValue(): float
    {
        return $this->value;
    }


}