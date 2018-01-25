<?php

namespace Beeriously\Domain\Ingredients\Grains;

use Doctrine\ORM\Mapping as ORM;

/**
 * Grain
 *
 * @ORM\Table(name="grain", indexes={@ORM\Index(name="grain_type_id", columns={"grain_type_id"})})
 * @ORM\Entity
 */
class Grain
{
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name = '';

    /**
     * @var string
     *
     * @ORM\Column(name="lovibond", type="decimal", precision=7, scale=2, nullable=false)
     */
    private $lovibond;

    /**
     * @var string
     *
     * @ORM\Column(name="lintner", type="integer", nullable=false)
     */
    private $lintner;

    /**
     * @var Beeriously\Domain\Ingredients\Grains\GrainType
     *
     * @ORM\ManyToOne(targetEntity="Beeriously\Domain\Ingredients\Grains\GrainType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="grain_type_id", referencedColumnName="id")
     * })
     */
    private $grainType;

    public function __construct(GrainName $name, GrainType $grainType, Lovibond $lovibond, DegreesLintner $lintner)
    {
        $this->id = GrainId::newId()->getValue();
        $this->name = $name->getValue();
        $this->grainType = $grainType;
        $this->lovibond = $lovibond->getValue();
        $this->lintner = $lintner->getValue();
    }

    public function getGrainType(): GrainType
    {
        return $this->grainType;
    }

    public function getName(): GrainName
    {
        return new GrainName($this->name);
    }

    public function getLovibond(): Lovibond
    {
        return Lovibond::fromFloat($this->lovibond);
    }

    public function getDegreesLintner(): DegreesLintner
    {
        return new DegreesLintner($this->lintner);
    }

    public function getId(): GrainId
    {
        return GrainId::fromString($this->id);
    }


}


