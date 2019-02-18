<?php

namespace App\AppBundle\Entity;

use Doctrine\ORM\Mapping;

/**
 * Class Student
 * @package App\AppBundle\Entity
 * @Mapping\Table(
 *     name="student",
 *     indexes={@Mapping\Index(name="path_idx", columns={"path"})}
 * )
 * @Mapping\Entity
 */
class Student
{
    /**
     * @var int
     * @Mapping\Column(name="id", type="integer", nullable=false)
     * @Mapping\Id
     * @Mapping\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     * @Mapping\Column(name="name", type="string", nullable=false)
     */
    private $name;

    /**
     * @var string
     * @Mapping\Column(name="description", type="string", length=500, nullable=false)
     */
    private $description;

    /**
     * @var string
     * @Mapping\Column(name="path", type="string", nullable=true)
     */
    private $path = '';

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Student
     */
    public function setName(string $name): Student
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Student
     */
    public function setDescription(string $description): Student
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     * @return Student
     */
    public function setPath(string $path): Student
    {
        $this->path = $path;
        return $this;
    }
}
