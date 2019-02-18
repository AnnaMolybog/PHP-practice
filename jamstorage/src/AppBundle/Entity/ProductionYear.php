<?php

namespace App\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="production_year")
 */
class ProductionYear
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     * @ORM\Column(name="name", type="integer", nullable=false, unique=true)
     */
    private $name;

    /**
     * @var JamJar
     * @ORM\OneToMany(targetEntity="JamJar", mappedBy="yearOfProduction")
     */
    private $jamJar;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return ProductionYear
     */
    public function setId(int $id): ProductionYear
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getName(): ?int
    {
        return $this->name;
    }

    /**
     * @param int $name
     * @return ProductionYear
     */
    public function setName(int $name): ProductionYear
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return JamJar
     */
    public function getJamJar(): JamJar
    {
        return $this->jamJar;
    }

    /**
     * @param JamJar $jamJar
     * @return ProductionYear
     */
    public function setJamJar(JamJar $jamJar): ProductionYear
    {
        $this->jamJar = $jamJar;
        return $this;
    }
}
