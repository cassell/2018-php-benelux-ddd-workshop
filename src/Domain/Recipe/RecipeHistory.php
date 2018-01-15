<?php

namespace Beeriously\Domain\Recipe;

use Beeriously\Domain\Generic\ValueObject\ImmutableArray;

class RecipeHistory extends ImmutableArray
{
    protected function guardType($item)
    {
        if(!$item instanceof RecipeEvent) {
            throw new \InvalidArgumentException;
        }
    }


}