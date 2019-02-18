<?php

namespace Tests\AppBundle\Service;

use AppBundle\Entity\User;
use AppBundle\Gateway\ExerciseGateway;
use AppBundle\Service\ExerciseService;
use PHPUnit\Framework\TestCase;

class ExerciseServiceTest extends TestCase
{
    /**
     * @param User $user
     * @dataProvider userDataProvider
     */
    public function testGetExercises(User $user)
    {
        $gateway = $this->getMockBuilder(ExerciseGateway::class)
            ->disableOriginalConstructor()
            ->getMock();
        $gateway->expects($this->once())
            ->method('getExercises')
            ->with($this->equalTo($user))
            ->will($this->returnValue([]));

        $service = new ExerciseService($gateway);
        $result = $service->getExercises($user);
        $this->assertTrue(is_array($result));
    }

    public function userDataProvider()
    {
        return [
            [
                new User()
            ]
        ];
    }
}
