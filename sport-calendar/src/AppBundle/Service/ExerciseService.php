<?php

namespace AppBundle\Service;

use AppBundle\Entity\User;
use AppBundle\Gateway\ExerciseGateway;

class ExerciseService
{
    private $gateway;

    public function __construct(ExerciseGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function getExercises(User $user)
    {
        return $this->gateway->getExercises($user);
    }
}