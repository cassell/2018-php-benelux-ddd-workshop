<?php

namespace Beeriously\Application\Event;

use Beeriously\Domain\Generic\ValueObject\ImmutableArray;
use InvalidArgumentException;

class Events extends ImmutableArray
{
    /**
     * Throw when the type of item is not accepted.
     *
     * @param $item
     * @throws InvalidArgumentException
     * @return void
     */
    protected function guardType($item)
    {
        if(!($item instanceof Event)) {
            throw new InvalidArgumentException;
        }
    }

}