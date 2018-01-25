<?php
declare(strict_types=1);

namespace Beeriously\Domain\Recipe;

use Beeriously\Domain\Generic\ValueObject\Identifier;
use Beeriously\Domain\Ingredients\Grains\DegreesLintner;
use Beeriously\Domain\Ingredients\Grains\GrainId;
use Beeriously\Domain\Ingredients\Grains\GrainName;
use Beeriously\Domain\Ingredients\Grains\GrainTypeDescription;
use Beeriously\Domain\Ingredients\Grains\GrainTypeId;
use Beeriously\Domain\Ingredients\Grains\Lovibond;
use Beeriously\Domain\Measurements\Weight\Kilograms;

class GrainWasAddedToRecipe extends RecipeEvent
{
    /**
     * @var RecipeId
     */
    private $recipeId;
    /**
     * @var GrainId
     */
    private $grainId;
    /**
     * @var GrainName
     */
    private $grainName;
    /**
     * @var DegreesLintner
     */
    private $degreesLintner;
    /**
     * @var Lovibond
     */
    private $lovibond;
    /**
     * @var GrainTypeId
     */
    private $grainTypeId;
    /**
     * @var GrainTypeDescription
     */
    private $grainTypeDescription;
    /**
     * @var Kilograms
     */
    private $kilograms;
    /**
     * @var \DateTimeImmutable
     */
    private $occurredOn;

    /**
     * @var Identifier
     */
    private $eventId;

    public function __construct(RecipeId $recipeId,
                                GrainId $grainId,
                                GrainName $grainName,
                                DegreesLintner $degreesLintner,
                                Lovibond $lovibond,
                                GrainTypeId $grainTypeId,
                                GrainTypeDescription $grainTypeDescription,
                                Kilograms $kilograms,
                                \DateTimeImmutable $occurredOn = null)
    {
        $this->eventId = Identifier::newId();
        $this->recipeId = $recipeId;
        $this->grainId = $grainId;
        $this->grainName = $grainName;
        $this->degreesLintner = $degreesLintner;
        $this->lovibond = $lovibond;
        $this->grainTypeId = $grainTypeId;
        $this->grainTypeDescription = $grainTypeDescription;
        $this->kilograms = $kilograms;
        $this->occurredOn = $occurredOn ?? new \DateTimeImmutable();
    }

    /**
     * @return RecipeId
     */
    public function getRecipeId(): RecipeId
    {
        return $this->recipeId;
    }

    /**
     * @return GrainId
     */
    public function getGrainId(): GrainId
    {
        return $this->grainId;
    }

    /**
     * @return GrainName
     */
    public function getGrainName(): GrainName
    {
        return $this->grainName;
    }

    /**
     * @return DegreesLintner
     */
    public function getDegreesLintner(): DegreesLintner
    {
        return $this->degreesLintner;
    }

    /**
     * @return Lovibond
     */
    public function getLovibond(): Lovibond
    {
        return $this->lovibond;
    }

    /**
     * @return GrainTypeId
     */
    public function getGrainTypeId(): GrainTypeId
    {
        return $this->grainTypeId;
    }

    /**
     * @return GrainTypeDescription
     */
    public function getGrainTypeDescription(): GrainTypeDescription
    {
        return $this->grainTypeDescription;
    }

    /**
     * @return Kilograms
     */
    public function getKilograms(): Kilograms
    {
        return $this->kilograms;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getOccurredOn(): \DateTimeImmutable
    {
        return $this->occurredOn;
    }

    /**
     * @return Identifier
     */
    public function getEventId(): Identifier
    {
        return $this->eventId;
    }



}