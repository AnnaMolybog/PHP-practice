<?php

namespace App\AppBundle\Service;

use App\AppBundle\Entity\Student;
use App\AppBundle\Repository\StudentRepository;
use Doctrine\ORM\Internal\Hydration\IterableResult;
use Doctrine\Common\Persistence\Mapping\MappingException;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\OptimisticLockException;
use App\AppBundle\Exception\PathWasNotSavedException;

class StudentService
{
    /**
     * @var StudentRepository
     */
    private $repository;

    /**
     * StudentService constructor.
     * @param StudentRepository $repository
     */
    public function __construct(StudentRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return IterableResult|array
     */
    public function getStudents()
    {
        return $this->repository->getStudents();
    }

    /**
     * @throws PathWasNotSavedException
     */
    public function save(): void
    {
        try {
            $this->repository->save();
        } catch (MappingException|ORMException|OptimisticLockException $excption) {
            throw new PathWasNotSavedException();
        }
    }

    /**
     * @param Student $student
     * @throws PathWasNotSavedException
     */
    public function persist(Student $student): void
    {
        try {
            $this->repository->persist($student);
        } catch (ORMException $excption) {
            throw new PathWasNotSavedException();
        }
    }

    /**
     * @param string $path
     * @return Student
     */
    public function findByPath(string $path): Student
    {
        return $this->repository->findByPath($path);
    }
}
