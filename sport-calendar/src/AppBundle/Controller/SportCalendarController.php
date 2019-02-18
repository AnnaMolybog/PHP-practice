<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\User\User;

class SportCalendarController extends Controller
{
    public function exercisesAction()
    {
        /*
         * @TODO: use real user
         */
        $user = $this->getUser();
        $exercises = $this->getExerciseService()->getExercises($user);

        return $this->render(
            '@App/exercises.html.twig',
            [
                'user' => $user,
                'exercises' => $this->getExercisePresenter()->setExercises($exercises)->present()
            ]
        );
    }

    protected function getExerciseService()
    {
        return $this->get('exercise_service');
    }

    protected function getExercisePresenter()
    {
        return $this->get('exercises_presenter');
    }
}
