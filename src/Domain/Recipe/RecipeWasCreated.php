<?php

namespace Beeriously\Domain\Recipe;

class RecipeWasCreated extends RecipeEvent
{
    /**
     * @var RecipeId
     */
    private $recipeId;
    /**
     * @var RecipeName
     */
    private $name;

    public function __construct(RecipeId $recipeId, RecipeName $name)
    {
        $this->recipeId = $recipeId;
        $this->name = $name;
    }

    public function getRecipeName(): RecipeName
    {
        return $this->name;
    }

    public function getRecipeId(): RecipeId
    {
        return $this->recipeId;
    }

}