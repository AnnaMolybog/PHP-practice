<?php

namespace AppBundle\Wrapper;

use AppBundle\Entity\Exercise;

class ExercisesWrapper
{
    /**
     * @var Exercise[]
     */
    protected $twoWeeks = [];

    /**
     * @var Exercise[]
     */
    protected $oneWeek = [];

    /**
     * @var Exercise[]
     */
    protected $today = [];

    /**
     * @return Exercise[]
     */
    public function getTwoWeeks(): array
    {
        return $this->twoWeeks;
    }

    /**
     * @param Exercise $exercise
     * @return ExercisesWrapper
     */
    public function setTwoWeeks($exercise): ExercisesWrapper
    {
        $this->twoWeeks[] = $exercise;
        return $this;
    }

    /**
     * @return Exercise[]
     */
    public function getOneWeek(): array
    {
        return $this->oneWeek;
    }

    /**
     * @param Exercise $exercise
     * @return ExercisesWrapper
     */
    public function setOneWeek($exercise): ExercisesWrapper
    {
        $this->oneWeek[] = $exercise;
        return $this;
    }

    /**
     * @return Exercise[]
     */
    public function getToday(): array
    {
        return $this->today;
    }

    /**
     * @param Exercise $exercise
     * @return ExercisesWrapper
     */
    public function setToday($exercise): ExercisesWrapper
    {
        $this->today[] = $exercise;
        return $this;
    }


}
