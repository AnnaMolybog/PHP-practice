<?php

namespace Tests\AppBundle\Presenter;

use AppBundle\Entity\Exercise;
use AppBundle\Presenter\ExercisesPresenter;
use AppBundle\Wrapper\ExercisesWrapper;
use PHPUnit\Framework\TestCase;

class ExercisesPresenterTest extends TestCase
{
    /**
     * @param array $exercises
     * @dataProvider exercisesDataProvider
     */
    public function testPresent(array $exercises)
    {
        $presenter = new ExercisesPresenter();
        $presenter->setExercises($exercises);
        $result = $presenter->present();

        $this->assertInstanceOf(ExercisesWrapper::class, $result);
        $this->assertTrue(!empty($result->getToday()));
    }

    public function exercisesDataProvider()
    {
        $today = date(DATE_ATOM, mktime(0, 0, 0, date("m")  , date("d"), date("Y")));
        $exercise = new Exercise();
        $exercise->setExerciseDate(new \DateTime($today));

        return [
            [
                [$exercise]
            ]
        ];
    }
}