<?php

namespace AppBundle\Presenter;

use AppBundle\Entity\Exercise;
use AppBundle\Wrapper\ExercisesWrapper;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class ExercisesPresenter
{
    /**
     * @var ArrayCollection
     */
    protected $exercises;

    /**
     * @param array $exercises
     * @return ExercisesPresenter
     */
    public function setExercises($exercises): ExercisesPresenter
    {
        $this->exercises = $exercises;
        return $this;
    }

    public function present()
    {
        $wrapper = new ExercisesWrapper();
        /**
         * @var Exercise $exercise
         */
        foreach ($this->exercises as $exercise) {
            if (strtotime($exercise->getExerciseDate()->format('Y-m-d')) >= strtotime($this->getTwoWeeksDate())
                && strtotime($exercise->getExerciseDate()->format('Y-m-d')) < strtotime($this->getOneWeekDate())
            ) {
                $wrapper->setTwoWeeks($exercise);
            } elseif (strtotime($exercise->getExerciseDate()->format('Y-m-d')) >= strtotime($this->getOneWeekDate())
                && strtotime($exercise->getExerciseDate()->format('Y-m-d')) < strtotime($this->today())
            ) {
                $wrapper->setOneWeek($exercise);
            } elseif (strtotime($exercise->getExerciseDate()->format('Y-m-d')) == strtotime($this->today())
            ) {
                $wrapper->setToday($exercise);
            }
        }

        return $wrapper;
    }

    protected function getTwoWeeksDate()
    {
        return (new \DateTime('-2 week'))->format('Y-m-d');
    }

    protected function getOneWeekDate()
    {
        return (new \DateTime('-1 week'))->format('Y-m-d');
    }

    protected function today()
    {
        return (new \DateTime('today'))->format('Y-m-d');
    }
}
