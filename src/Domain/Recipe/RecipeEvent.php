<?php

namespace Beeriously\Domain\Recipe;

use Beeriously\Application\Event\Event;

abstract class RecipeEvent extends Event
{
    abstract public function getRecipeId(): RecipeId;

}