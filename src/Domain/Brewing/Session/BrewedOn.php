<?php

namespace Beeriously\Domain\Brewing\Session;

class BrewedOn
{
    /**
     * @var \DateTimeInterface
     */
    private $dateTime;

    public function __construct(\DateTimeInterface $dateTime)
    {
        if($dateTime < new \DateTimeImmutable('2017-11-15')) {
            throw new \InvalidArgumentException("Date too far in the past");
        }

        if($dateTime > new \DateTimeImmutable('2018-11-15')) {
            throw new \InvalidArgumentException("Date too far in the future");
        }

        $this->dateTime = new \DateTimeImmutable($dateTime->format('r'));

    }

    public function getValue(): \DateTimeImmutable
    {
        return $this->dateTime;
    }

}



