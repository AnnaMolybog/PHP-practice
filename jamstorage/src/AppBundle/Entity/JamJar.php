<?php

namespace App\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="jam_jar")
 */
class JamJar
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var JamType
     * @ORM\ManyToOne(targetEntity="JamType", inversedBy="jamJar")
     */
    private $type;

    /**
     * @var ProductionYear
     * @ORM\ManyToOne(targetEntity="ProductionYear", inversedBy="jamJar")
     */
    private $yearOfProduction;

    /**
     * @var string
     * @ORM\Column(name="comment", type="string", length=255, nullable=true)
     */
    private $comment;

    /**
     * @var int
     */
    private $amount = 1;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return JamType|null
     */
    public function getType(): ?JamType
    {
        return $this->type;
    }

    /**
     * @param JamType $type
     * @return JamJar
     */
    public function setType(JamType $type): JamJar
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return ProductionYear|null
     */
    public function getYearOfProduction(): ?ProductionYear
    {
        return $this->yearOfProduction;
    }

    /**
     * @param ProductionYear $yearOfProduction
     * @return JamJar
     */
    public function setYearOfProduction(ProductionYear $yearOfProduction): JamJar
    {
        $this->yearOfProduction = $yearOfProduction;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @param string|null $comment
     * @return JamJar
     */
    public function setComment($comment): JamJar
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     * @return JamJar
     */
    public function setAmount(int $amount): JamJar
    {
        $this->amount = $amount;
        return $this;
    }
}
