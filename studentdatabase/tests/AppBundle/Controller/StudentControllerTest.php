<?php

namespace App\Tests\AppBundle\Controller;

use App\AppBundle\Controller\StudentController;
use App\AppBundle\Entity\Student;
use App\AppBundle\Repository\StudentRepository;
use App\AppBundle\Service\StudentService;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Templating\EngineInterface;

class StudentControllerTest extends TestCase
{
    const PATH = 'path';

    public function testDetails()
    {
        $student = new Student();
        $student->setPath(self::PATH);
        $templatingEngine = $this->createMock(EngineInterface::class);
        $templatingEngine->expects($this->once())
            ->method('render')
            ->with('@App/Student/details.html.twig', ['student' => $student]);

        $repository = $this->createMock(StudentRepository::class);
        $repository->expects($this->once())
            ->method('findByPath')
            ->with(self::PATH)
            ->willReturn($student);
        $studentService = new StudentService($repository);

        $request = new Request(['path' => self::PATH]);
        $controller = new StudentController($templatingEngine, $studentService);
        $response = $controller->detailsAction($request);
        $this->assertEquals(900, $response->getMaxAge());
    }
}