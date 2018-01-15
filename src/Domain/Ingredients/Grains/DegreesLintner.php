<?php

namespace Beeriously\Domain\Ingredients\Grains;

// https://en.wikipedia.org/wiki/Degree_Lintner
class DegreesLintner
{
    private const SYMBOL = "°L";

    /**
     * @var int
     */
    private $degrees;

    public function __construct(int $degrees)
    {
        if($degrees < 0) {
            throw new \InvalidArgumentException;
        }
        $this->degrees = $degrees;
    }

    public function getValue()
    {
        return $this->degrees;
    }

    public function __toString()
    {
        return round($this->degrees,0) . " " . self::SYMBOL;
    }

}