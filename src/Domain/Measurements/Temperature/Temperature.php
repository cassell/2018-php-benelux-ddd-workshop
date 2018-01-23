<?php

declare(strict_types=1);

namespace Beeriously\Domain\Measurements\Temperature;

interface Temperature
{
    public function getValue(): float;

    public static function getSymbol(): string;

}
