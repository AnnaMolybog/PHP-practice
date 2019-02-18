<?php

namespace App\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="jam_type")
 */
class JamType
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=255, nullable=false, unique=true)
     */
    private $name;

    /**
     * @var JamJar
     * @ORM\OneToMany(targetEntity="JamJar", mappedBy="type")
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
     * @return JamType
     */
    public function setId(int $id): JamType
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return JamType
     */
    public function setName(string $name): JamType
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
     * @return JamType
     */
    public function setJamJar(JamJar $jamJar): JamType
    {
        $this->jamJar = $jamJar;
        return $this;
    }
}
