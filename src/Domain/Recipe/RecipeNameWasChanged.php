<?php
declare(strict_types=1);

namespace Beeriously\Domain\Recipe;

use Beeriously\Domain\Generic\ValueObject\Identifier;

class RecipeNameWasChanged extends RecipeEvent
{
    /**
     * @var RecipeName
     */
    private $oldName;
    /**
     * @var RecipeName
     */
    private $newName;
    /**
     * @var \DateTimeImmutable
     */
    private $occurredOn;
    /**
     * @var RecipeId
     */
    private $recipeId;

    private $eventId;

    public function __construct(RecipeId $recipeId, RecipeName $oldName, RecipeName $newName, \DateTimeImmutable $occurredOn)
    {
        $this->eventId = Identifier::newId(); // for storage
        $this->recipeId = $recipeId;
        $this->oldName = $oldName;
        $this->newName = $newName;
        $this->occurredOn = $occurredOn;
    }

    /**
     * @return RecipeName
     */
    public function getOldName(): RecipeName
    {
        return $this->oldName;
    }

    /**
     * @return RecipeName
     */
    public function getNewName(): RecipeName
    {
        return $this->newName;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getOccurredOn(): \DateTimeImmutable
    {
        return $this->occurredOn;
    }

    /**
     * @return RecipeId
     */
    public function getRecipeId(): RecipeId
    {
        return $this->recipeId;
    }


}