<?php

namespace App\AppBundle\Service;

use App\AppBundle\Entity\Student;
use App\AppBundle\Exception\PathWasNotSavedException;

class StudentRouteGenerator
{
    const BATCH_SIZE = 50;

    /**
     * @var PathGenerator
     */
    private $pathGenerator;

    /**
     * @var StudentService
     */
    private $studentService;

    /**
     * StudentRouteGenerator constructor.
     * @param PathGenerator $pathGenerator
     * @param StudentService $studentService
     */
    public function __construct(PathGenerator $pathGenerator, StudentService $studentService)
    {
        $this->pathGenerator = $pathGenerator;
        $this->studentService = $studentService;
    }

    /**
     * @throws PathWasNotSavedException
     */
    public function generate(): void
    {
        $iteration = 0;
        foreach ($this->studentService->getStudents() as $students) {
            /** @var Student $student */
            $student = $students[0];
            $student->setPath($this->pathGenerator->generatePath($student->getName()));
            $this->studentService->persist($student);
            if ($iteration % self::BATCH_SIZE === 0) {
                $this->studentService->save();
            }
            ++$iteration;
        }
        $this->studentService->save();
    }
}
