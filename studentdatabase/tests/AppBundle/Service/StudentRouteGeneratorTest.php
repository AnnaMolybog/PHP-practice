<?php

namespace App\Tests\AppBundle\Service;

use App\AppBundle\Entity\Student;
use App\AppBundle\Exception\PathWasNotSavedException;
use App\AppBundle\Repository\StudentRepository;
use App\AppBundle\Service\PathGenerator;
use App\AppBundle\Service\StudentRouteGenerator;
use App\AppBundle\Service\StudentService;
use Doctrine\ORM\ORMException;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

class StudentRouteGeneratorTest extends TestCase
{
    public function testGenerate()
    {
        $repository = $this->createMock(StudentRepository::class);
        $repository->expects($this->once())
            ->method('getStudents')
            ->willReturn([[(new Student())->setName('Anna Moli')]]);
        $repository->expects($this->once())
            ->method('persist')
            ->with($this->isInstanceOf(Student::class));
        $repository->expects($this->exactly(2))
            ->method('save');
        $generator = new StudentRouteGenerator(new PathGenerator(), new StudentService($repository));
        $generator->generate();
    }

    public function testSaveException()
    {
        $repository = $this->createMock(StudentRepository::class);
        $repository->expects($this->once())
            ->method('getStudents')
            ->willReturn([[(new Student())->setName('Anna Moli')]]);
        $repository->expects($this->once())
            ->method('persist')
            ->with($this->isInstanceOf(Student::class));
        $repository->expects($this->once())
            ->method('save')
            ->willThrowException(new ORMException());
        $generator = new StudentRouteGenerator(new PathGenerator(), new StudentService($repository));
        $this->expectException(PathWasNotSavedException::class);
        $generator->generate();
    }

    public function testPersistException()
    {
        $repository = $this->createMock(StudentRepository::class);
        $repository->expects($this->once())
            ->method('getStudents')
            ->willReturn([[(new Student())->setName('Anna Moli')]]);
        $repository->expects($this->once())
            ->method('persist')
            ->with($this->isInstanceOf(Student::class))
            ->willThrowException(new ORMException());
        $repository->expects($this->never())
            ->method('save');
        $generator = new StudentRouteGenerator(new PathGenerator(), new StudentService($repository));
        $this->expectException(PathWasNotSavedException::class);
        $generator->generate();
    }
}
