<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ExerciseRepository")
 * @ORM\Table(name="exercise")
 */
class Exercise
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
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var int
     * @ORM\Column(name="weight", type="integer", nullable=false)
     */
    private $weight;

    /**
     * @var int
     * @ORM\Column(name="times_of_exercise", type="integer", nullable=false)
     */
    private $timesOfExercise;

    /**
     * @var \DateTime
     * @ORM\Column(name="exercise_date", type="date", nullable=false)
     */
    private $exerciseDate;

    /**
     * @var \DateTime
     * @ORM\Column(name="exercise_time", type="time", nullable=false)
     */
    private $exerciseTime;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="exercises")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Exercise
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     *
     * @return Exercise
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set timesOfExercise
     *
     * @param integer $timesOfExercise
     *
     * @return Exercise
     */
    public function setTimesOfExercise($timesOfExercise)
    {
        $this->timesOfExercise = $timesOfExercise;

        return $this;
    }

    /**
     * Get timesOfExercise
     *
     * @return int
     */
    public function getTimesOfExercise()
    {
        return $this->timesOfExercise;
    }

    /**
     * Set exerciseDate
     *
     * @param \DateTime $exerciseDate
     *
     * @return Exercise
     */
    public function setExerciseDate($exerciseDate)
    {
        $this->exerciseDate = $exerciseDate;

        return $this;
    }

    /**
     * Get exerciseDate
     *
     * @return \DateTime
     */
    public function getExerciseDate()
    {
        return $this->exerciseDate;
    }

    /**
     * Set exerciseTime
     *
     * @param \DateTime $exerciseTime
     *
     * @return Exercise
     */
    public function setExerciseTime($exerciseTime)
    {
        $this->exerciseTime = $exerciseTime;

        return $this;
    }

    /**
     * Get exerciseTime
     *
     * @return \DateTime
     */
    public function getExerciseTime()
    {
        return $this->exerciseTime;
    }
}

