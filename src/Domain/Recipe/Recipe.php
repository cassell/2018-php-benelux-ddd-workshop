<?php

namespace Beeriously\Domain\Recipe;

use Beeriously\Domain\Event\EventRecorder;

class Recipe
{
    use EventRecorder;

    /**
     * @var RecipeHistory
     */
    private $recipeHistory;
    private $id;
    private $recipeName;

    private function __construct(RecipeHistory $recipeHistory)
    {
        $this->recipeHistory = $recipeHistory;
        foreach($this->recipeHistory as $event) {
            $this->applyEvent($event);
        }
    }

    public static function newRecipe(RecipeName $name): Recipe
    {
        $id = RecipeId::newId();
        $createdEvent = new RecipeWasCreated($id, $name);
        $recipeHistory = new RecipeHistory([$createdEvent]);
        return new self($recipeHistory);
    }

    public static function rehydrate(RecipeHistory $recipeHistory)
    {
        return new self($recipeHistory);
    }

    public function applyRecipeWasCreatedEvent(RecipeWasCreated $event)
    {
        $this->id = $event->getRecipeId();
        $this->recipeName = $event->getRecipeName();
    }


    private function applyEvent(RecipeEvent $event)
    {
        $method = $this->getApplyMethod($event);
        $this->$method($event);
    }

    private function getApplyMethod(RecipeEvent $event)
    {
        $classParts = explode('\\', get_class($event));

        return 'apply' . end($classParts) . 'Event';
    }

    public function getName(): RecipeName
    {
        return $this->recipeName;
    }

}