<?php

namespace Beeriously\Tests\Integration\Domain\Recipe;

use Beeriously\Domain\Recipe\Recipe;
use Beeriously\Domain\Recipe\RecipeName;
use PHPUnit\Framework\TestCase;

class RecipeEventSourcingTest extends TestCase
{

    public function testNewRecipe()
    {
        $recipe = Recipe::newRecipe(new RecipeName('NEIPHPA'));
        $this->assertEquals("NEIPHPA",$recipe->getName());
    }

    public function testRecipeChangeName()
    {
        $recipe = Recipe::newRecipe(new RecipeName('NEIPHPA'));
        $recipe->changeName(new RecipeName('Recursiweizen'));
        $this->assertEquals("Recursiweizen",$recipe->getName());
    }


}
