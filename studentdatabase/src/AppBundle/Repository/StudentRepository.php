<?php

namespace App\AppBundle\Repository;

use App\AppBundle\Entity\Student;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Internal\Hydration\IterableResult;
use Doctrine\Common\Persistence\Mapping\MappingException;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\OptimisticLockException;
use App\AppBundle\Exception\StudentNotFoundException;

class StudentRepository extends ServiceEntityRepository
{
    const DEFAULT_LIMIT = 20;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Student::class);
    }

    /**
     * @return IterableResult|array
     */
    public function getStudents()
    {
        $query = $this->getEntityManager()->createQuery(
            "SELECT s FROM " . Student::class . " s"
        );
        return $query->iterate();
    }

    /**
     * @throws MappingException
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function save(): void
    {
        $this->getEntityManager()->flush();
        $this->getEntityManager()->clear();
    }

    /**
     * @param Student $student
     * @throws ORMException
     */
    public function persist(Student $student): void
    {
        $this->getEntityManager()->persist($student);
    }

    /**
     * @param string $path
     * @return Student
     * @throws StudentNotFoundException
     */
    public function findByPath(string $path): Student
    {
        $student = $this->findOneBy(['path' => $path]);
        if (!$student instanceof Student) {
            throw new StudentNotFoundException();
        }
        return $student;
    }
}
