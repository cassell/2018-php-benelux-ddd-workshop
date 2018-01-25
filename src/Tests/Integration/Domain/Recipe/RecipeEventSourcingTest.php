<?php

namespace Beeriously\Tests\Integration\Domain\Recipe;

use Beeriously\Application\Repository\DoctrineGrainRepository;
use Beeriously\Domain\Ingredients\Grains\Grain;
use Beeriously\Domain\Ingredients\Grains\GrainId;
use Beeriously\Domain\Measurements\Weight\Kilograms;
use Beeriously\Domain\Measurements\Weight\Pounds;
use Beeriously\Domain\Recipe\Recipe;
use Beeriously\Domain\Recipe\RecipeName;
use Beeriously\Tests\Integration\ContainerAwareTestCase;

class RecipeEventSourcingTest  extends ContainerAwareTestCase
{

    public function testNewRecipe()
    {
        $recipe = Recipe::newRecipe(new RecipeName('NEIPHPA'), new \DateTimeImmutable());
        $this->assertEquals("NEIPHPA",$recipe->getName()->getValue());
    }

    public function testRecipeChangeName()
    {
        $recipe = Recipe::newRecipe(new RecipeName('NEIPHPA'),new \DateTimeImmutable());
        $recipe->changeName(new RecipeName('Recursiweizen'),new \DateTimeImmutable());
        $this->assertEquals("Recursiweizen",$recipe->getName()->getValue());
    }

    public function testRecipeChangeNameUserDidNotChange()
    {
        $this->expectException(\InvalidArgumentException::class);
        $recipe = Recipe::newRecipe(new RecipeName('NEIPHPA'),new \DateTimeImmutable());
        $recipe->changeName(new RecipeName('NEIPHPA'),new \DateTimeImmutable());
    }

    public function testAddZeroWeightGrainToRecipe()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Unable to measure less than 0.1 on scale.");
        $recipe = Recipe::newRecipe(new RecipeName('NEIPHPA'), new \DateTimeImmutable());
        $recipe->addGrain($this->getTwoRow(), Kilograms::fromPounds(new Pounds(0)));

    }

    public function testAddGrainToRecipe()
    {
        $recipe = Recipe::newRecipe(new RecipeName('NEIPHPA'),new \DateTimeImmutable());
        $recipe->addGrain($this->getTwoRow(),Kilograms::fromPounds(new Pounds(11)));
        $recipe->addGrain($this->getOats(),Kilograms::fromPounds(new Pounds(1)));
        $recipe->addGrain($this->getMarrisOtter(),Kilograms::fromPounds(new Pounds(1)));
        $recipe->addGrain($this->getPilsner(),Kilograms::fromPounds(new Pounds(1)));

        $this->assertEquals(6.4,round($recipe->getWeightOfGrainsInKilos()->getValue(),1));


    }

    private function getTwoRow(): Grain
    {
        return $this->findGrainById('c9fe257d-ef6e-47ac-8c5f-ffd328147c78');

    }

    private function getOats(): Grain
    {
        return $this->findGrainById('1c1d4b6b-c743-43c2-8833-d6cce396058f');
    }

    private function getMarrisOtter(): Grain
    {
        return $this->findGrainById('c9fe257d-ef6e-47ac-8c5f-ffd328147c78');
    }

    private function getPilsner(): Grain
    {
        return $this->findGrainById('c9fe257d-ef6e-47ac-8c5f-ffd328147c78');
    }

    private function findGrainById(string $grainId): Grain
    {
        /** @var Grain $grain */
        $grain =  $this->getRepo()->find($grainId);
        return $grain;
    }

    private function getRepo(): DoctrineGrainRepository
    {
        return $this->get(DoctrineGrainRepository::class);
    }


}
